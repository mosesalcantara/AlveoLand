<?php

namespace App\Http\Controllers;

use App\Models\client;
use App\Models\submitted_property;
use App\Models\submitted_property_images;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class Client_Controller extends Controller
{
    //
    public function Submit_Property(Request $request)
    {
        $rules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'contact' => 'required',
            'email' => 'required||unique:client,cemail',
            'front_id' => 'required',
            'back_id' => 'required',
            'project' => 'required',
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
            $property->cproject = $request->project;
            $property->cunit_no = $request->unit_no;
            $property->cfor = $request->purpose;
            $property->cstatus = "Pending";
            $saveC_property = $property->save();
            if ($saveC_property) {
                DB::commit();
                $submitted_property = submitted_property::where('client_id', $find_client->id)->first();
                $file = $request->file('images');
                $images = new submitted_property_images();
                foreach ($file as $image) {
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
                    return response()->json(['status' => 400, 'message' => 'Apologies for the loob. Please try again.']);
                }
            } else {
                return response()->json(['status' => 400, 'message' => 'Apologies for the loooo. Please try again.']);
            }
        } else {
            return response()->json(['status' => 400, 'message' => 'Apologies for the inconvenience. Please try again.']);
        }
    }
}
