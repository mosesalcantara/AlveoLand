<?php

namespace App\Http\Controllers;

use App\Models\client;
use App\Models\images;
use App\Models\submitted_property;
use App\Models\submitted_property_images;
use App\Models\project_properties;
use App\Models\project_units;
use App\Models\project_unit_snapshots;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

use Mail;
use App\Mail\UnitRegistration;

class Client_Controller extends Controller
{
    //
    public function Submit_Property(Request $request)
    {
        $rules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'contact' => 'required',
            'email' => 'required|email',
            'front_id' => 'required',
            'back_id' => 'required',
            'property_id' => 'required',
            'unit_no' => 'required',
            'purpose' => 'required',
            'images' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['status' => 400, 'errors' => $validator->errors()]);
        }

        DB::beginTransaction();
        $client = new client();
        $client->cfname = $request->first_name;
        $client->clname = $request->last_name;
        $client->ccontact = $request->contact;
        $client->cemail = $request->email;
        $f = mt_rand(111111111, 999999999);
        $b = mt_rand(111111111, 999999999);
        $imgf = $request->file('front_id');
        $imgb = $request->file('back_id');

        $imgnamef = $f . '.' . $imgf->extension();
        $imgnameb = $b . '.' . $imgb->extension();
        $imgf->move('client', $imgnamef);
        $imgb->move('client', $imgnameb);
        $client->cidfront = $imgnamef;
        $client->cidback = $imgnameb;
        $saveC_client = $client->save();
        if ($saveC_client) {
            DB::commit();
            $find_client = client::where('cfname', $request->first_name)->where('clname', $request->last_name)->where('cemail', $request->email)->first();
            $property = new submitted_property();
            $property->client_id = $find_client->id;
            $property->property_id = $request->property_id;
            $property->cunit_no = $request->unit_no;
            $property->cfor = $request->purpose;
            $property->ccategory_description = $request->category_description;
            $property->ctype = $request->type;
            $property->cprice = $request->price;
            $property->csize = $request->size;
            $property->cstatus = "Pending";
            $saveC_property = $property->save();
            if ($saveC_property) {
                DB::commit();
                $submitted_property = submitted_property::where('client_id', $find_client->id)->first();
                $file = $request->file('images');
                foreach ($file as $image) {
                    $images = new submitted_property_images();
                    $ran = mt_rand(111111111, 999999999);
                    $imgname = $ran . '.' . $image->extension();
                    $image->move('submitted_properties/', $imgname);
                    $images->submitted_property_id = $submitted_property->id;
                    $images->image_name = $imgname;
                    $images_saved = $images->save();
                }
                if ($images_saved) {
                    return response()->json(['status' => 200, 'message' => 'Thank you for submitting your property! It will undergo review promptly.']);
                } else {
                    return response()->json(['status' => 400, 'message' => 'Apologies for the inconvenience. Please try again.']);
                }
            } else {
                return response()->json(['status' => 400, 'message' => 'Apologies for the inconvenience. Please try again.']);
            }
        } else {
            return response()->json(['status' => 400, 'message' => 'Apologies for the inconvenience. Please try again.']);
        }
    }
    public function GetAllRequest()
    {
        $result = client::join('submitted_property', 'client.id', '=', 'submitted_property.client_id')->where('submitted_property.cstatus', 'Pending')->select('client.id as client_id', 'client.*', 'submitted_property.*', 'submitted_property.id as submitted_id', 'submitted_property.*')->get();
        return response()->json(['properties' => $result]);
    }
    public function GetPropertyDetails($id)
    {
        $result = client::join('submitted_property', 'client.id', '=', 'submitted_property.client_id')->where('client.id', $id)->select('client.id as client_id', 'client.*', 'submitted_property.*', 'submitted_property.id as submitted_id', 'submitted_property.*')->first();
        $project = project_properties::select('project_name')->where('id', $result->property_id)->first();
        $result['project'] = $project->project_name;
        $result['images'] = submitted_property_images::where('submitted_property_id', $result->submitted_id)->get();
        return response()->json($result);
    }

    public function GetProjects() {
        $result = project_properties::select('id', 'project_name')->orderBy('project_name')->get();
        return response()->json($result);
    }

    public function ApproveSubmission($id) {
        $result = client::join('submitted_property', 'client.id', '=', 'submitted_property.client_id')->where('client.id', $id)->select('client.id as client_id', 'client.*', 'submitted_property.*', 'submitted_property.id as submitted_id', 'submitted_property.*')->first();
        $images = submitted_property_images::where('submitted_property_id', $result->submitted_id)->get();

        $unit = new project_units();
        $unit->project_properties_id = $result->property_id;
        $unit->project_unit_no = $result->cunit_no;
        $image = $images[0]->image_name;
        $unit->project_unit_banner = $image;
        File::copy(public_path("submitted_properties/$image"), public_path("project/units/snapshots/$image"));
        $unit->project_unit_type = $result->ctype;
        $unit->project_unit_price = $result->cprice;
        $unit->project_unit_category_type = $result->cfor;
        $unit->project_unit_category_description = $result->ccategory_description;
        $unit->project_unit_size = $result->csize;
        $unit->project_unit_status = 'Available';
        $unit->save();

        foreach ($images as $snapshot) {
            $snapshot = $snapshot->image_name;
            $record = new project_unit_snapshots();
            File::copy(public_path("submitted_properties/$snapshot"), public_path("project/units/snapshots/$snapshot"));
            $record->project_units_id = $unit->id;
            $record->project_unit_snapshot_name = $snapshot;
            $record->save();
        }

        $record = submitted_property::find($result->submitted_id);
        $record->update([
            'cstatus' => 'Available',
        ]);

        $mail_data = [
            'name' => $result->cfname . " " . $result->clname,
        ];

        Mail::to($result->cemail)->send(new UnitRegistration($mail_data));

        return response()->json(['status' => 200, 'message' => 'Submitted Unit was Aprroved.']);
    }
}
