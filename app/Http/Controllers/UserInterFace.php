<?php

namespace App\Http\Controllers;

use App\Mail\subscriber_mail;
use App\Models\about;
use App\Models\amenities;
use App\Models\awards;
use App\Models\company_objective;
use App\Models\construction;
use App\Models\featured_properties;
use App\Models\features;
use App\Models\features_amenities;
use App\Models\gallery;
use App\Models\head;
use App\Models\images;
use App\Models\inquiry;
use App\Models\integrations;
use App\Models\plans;
use App\Models\plans_details;
use App\Models\project_properties;
use App\Models\project_unit_snapshots;
use App\Models\project_unit_videos;
use App\Models\project_units;
use App\Models\projects;
use App\Models\properties;
use App\Models\property_units;
use App\Models\prospects;
use App\Models\subscriber;
use App\Models\tagline;
use App\Models\unit_images;
use App\Models\visitation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class UserInterFace extends Controller
{


    public function Logo()
    {
        $logo = head::join('gallery', 'head.id', '=', 'gallery.owner_id')->join('images', 'gallery.id', '=', 'images.gallery_id')
            ->where('role', '1')->first();
        return view('layout.user.layout', ['logo' => $logo]);
        // return response()->json(['active_logo' => $logo]);
    }
    public function Tagline()
    {
        $tagline = tagline::where('status', '1')->first();
        return response()->json(['active_tagline' => $tagline]);
    }
    public function View_Property()
    {
        return view('pages.property_view');
    }
    public function LocationList()
    {
        $locations = project_properties::select('city')
            ->distinct()
            ->orderBy('city')
            ->get()
            ->groupBy('city');

        $count = count($locations);
        if ($count > 0) {
            return response()->json(['status' => 200, 'locations' => $locations]);
        } else {
            return response()->json(['status' => 400, 'message' => 'No results found']);
        }
    }






    public function Comapany_Objective()
    {
        $obj = company_objective::first();
        if ($obj) {
            return response()->json(['status' => 200, 'objective' => $obj]);
        } else {
            return response()->json(['status' => 400, 'message' => 'No results found']);
        }
    }

    public function Comapany_Do()
    {
        $obj = about::where('role', '2')->first();
        if ($obj) {
            return response()->json(['status' => 200, 'wedo' => $obj]);
        } else {
            return response()->json(['status' => 400, 'message' => 'No results found']);
        }
    }

    public function Missions()
    {
        $obj = about::where('role', '0')->get();
        $count = count($obj);
        if ($count > 0) {
            return response()->json(['status' => 200, 'missions' => $obj]);
        } else {
            return response()->json(['status' => 400, 'message' => 'No results found']);
        }
    }
    public function Vision()
    {
        $obj = about::where('role', '1')->first();
        if ($obj) {
            return response()->json(['status' => 200, 'vision' => $obj]);
        } else {
            return response()->json(['status' => 400, 'message' => 'No results found']);
        }
    }
    public function Awards()
    {
        $obj = awards::selectRaw('YEAR(date) as year')
            ->groupBy(DB::raw('YEAR(date)'))->orderBy('year', 'asc')
            ->get();
        $count = count($obj);
        if ($count > 0) {
            return response()->json(['status' => 200, 'years' => $obj]);
        } else {
            return response()->json(['status' => 400, 'message' => 'No results found']);
        }
    }
    public function SelectAwards($year)
    {
        $awards = awards::whereYear('date', $year)->get();
        $count = count($awards);
        if ($count > 0) {
            return response()->json(['status' => 200, 'awards' => $awards]);
        } else {
            return response()->json(['status' => 400, 'message' => 'No results found']);
        }
    }


    public function Projects()
    {


        $obj = projects::select('city', 'id')->orderBy('city', 'asc')
            ->get();
        $count = count($obj);
        if ($count > 0) {
            return response()->json(['status' => 200, 'city' => $obj]);
        } else {
            return response()->json(['status' => 400, 'message' => 'No results found']);
        }
    }
    public function SelectProjectsData($city)
    {
        try {
            $projects = projects::where('city', $city)->get();
            $count = count($projects);

            if ($count > 0) {
                return response()->json(['status' => 200, 'projects' => $projects]);
            } else {
                return response()->json(['status' => 400, 'message' => 'No results found']);
            }
        } catch (\Exception $e) {
            // Log or handle the exception appropriately
            return response()->json(['status' => 500, 'message' => 'Internal Server Error']);
        }
    }

































    public function Send_Subscription_Mail(Request $request)
    {
        $rules = [
            'email' => 'required|email|unique:subscriber,email',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['status' => 400, 'errors' => $validator->errors()]);
        }

        DB::beginTransaction();

        $sub = new subscriber();
        $sub->id = mt_rand(111111111, 999999999);
        $sub->email = $request->email;
        $saved = $sub->save();

        if ($saved) {
            $mail = [
                'message' => 'You are now successfully subscribed to our newsletter. Thank you!',
            ];
            $sent = Mail::to($request->email)->send(new subscriber_mail($mail));
            if ($sent) {

                DB::commit();
                return response()->json(['status' => 200, 'message' => 'Please check your email. Thank you']);
            } else {
                DB::rollBack();
                return response()->json(['status' => 400, 'message' => 'Please try again']);
            }
        } else {
            return response()->json(['status' => 400, 'message' => 'Please try again']);
        }
    }

    public function Send_Message(Request $request)
    {
        $rules = [
            'email' => 'required|unique:inquiry,email',
            'type_of_inquiry' => 'required',
            'gender_identification' => 'required',
            'f_name' => 'required',
            'l_name' => 'required',
            'age' => 'required',
            'email' => 'required',
            'phone_num' => 'required',
            'message' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['status' => 400, 'errors' => $validator->errors()]);
        }

        $inquiry = new inquiry();
        $inquiry->id = mt_rand(111111111, 999999999);
        $inquiry->type_of_inquiry = $request->type_of_inquiry;
        $inquiry->identicality = $request->gender_identification;
        $inquiry->f_name = $request->f_name;
        $inquiry->l_name = $request->l_name;
        $inquiry->age = $request->age;
        $inquiry->email = $request->email;
        $inquiry->phone_num = $request->phone_num;
        $inquiry->message = $request->message;
        $inquiry->status = 'Submitted';
        $submit = $inquiry->save();
        if ($submit) {
            return response()->json(['status' => 200, 'message' => 'Thank you for submitting your inquiry. We will be in touch with you as soon as possible']);
        } else {
            return response()->json(['status' => 400, 'message' => 'Please try again ']);
        }
    }
    public function Create_Schedule_Visit(Request $request)
    {
        $rules = [
            'full_name' => 'required',
            'contact' => 'required',
            'date' => 'required',
            'time' => 'required',
            'email' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['status' => 400, 'errors' => $validator->errors()]);
        }

        $visit = new visitation();
        $visit->full_name = $request->full_name;
        $visit->contact = $request->contact;
        $visit->email = $request->email;
        $visit->date = $request->date;
        $visit->time = $request->time;
        $visit->unit_id = $request->unit_id;
        $visit->status = 'Pending';
        $submit = $visit->save();
        if ($submit) {
            return response()->json(['status' => 200, 'message' => 'Thank you for your submission. We will promptly process your visitation request and reach out to you at the earliest convenience. Your patience is appreciated. Thank you.']);
        } else {
            return response()->json(['status' => 400, 'message' => 'Please try again ']);
        }
    }






















    // FOR SALE 
    public function All_Project_Properties()
    {
        $project = project_properties::all();
        if (count($project) > 0) {
            return response()->json(['status' => 200, 'message' => 'Results found', 'projects' => $project]);
        } else {
            return response()->json(['status' => 400, 'message' => 'Results found', 'projects' => $project]);
        }
    }
    public function Project_Details($id)
    {
        $project = project_properties::where('project_properties_id', $id)->fist();

        if ($project) {
            return response()->json(['status' => 200, 'message' => 'Results found', 'project' => $project]);
        } else {
            return response()->json(['status' => 400, 'message' => 'Results found', 'project' => $project]);
        }
    }
    public function All_Project_Units_Data($id)
    {
        $units = project_properties::join('project_units', 'project_properties.id', '=', 'project_units.project_properties_id')->where('project_properties_id', $id)->select('project_properties.city', 'project_units.*')->get();
        $project = project_properties::find($id);
        if ($project) {
            return response()->json(['status' => 200, 'message' => 'Results found', 'project' => $project, 'units' => $units]);
        } else {
            return response()->json(['status' => 400, 'message' => 'Results found', 'project' => $project, 'units' => $units]);
        }
    }
    public function All_Project_Sale_Units_Data()
    {
        $units = project_properties::join('project_units', 'project_properties.id', '=', 'project_units.project_properties_id')->where('project_units.project_unit_category_type', 'Sale')->select('project_properties.city', 'project_units.*')->get();
        if ($units) {
            return response()->json(['status' => 200, 'message' => 'Results found', 'units' => $units, 'units' => $units]);
        } else {
            return response()->json(['status' => 400, 'message' => 'Results found', 'units' => $units, 'units' => $units]);
        }
    }
    public function All_Project_Lease_Units_Data()
    {
        $units = project_properties::join('project_units', 'project_properties.id', '=', 'project_units.project_properties_id')->where('project_units.project_unit_category_type', 'Lease')->select('project_properties.city', 'project_units.*')->get();
        if ($units) {
            return response()->json(['status' => 200, 'message' => 'Results found', 'units' => $units, 'units' => $units]);
        } else {
            return response()->json(['status' => 400, 'message' => 'Results found', 'units' => $units, 'units' => $units]);
        }
    }

    public function Display_Unit_Information($id)
    {
        $unit = project_properties::join('project_units', 'project_properties.id', '=', 'project_units.project_properties_id')->where('project_units.id', $id)->select('project_units.*', 'project_properties.project_banner', 'project_properties.project_name', 'project_properties.id as project_id', 'project_properties.city', 'project_properties.street', 'project_properties.barangay')->first();
        $imgs = project_unit_snapshots::where('project_units_id', $id)->get();
        $vids = project_unit_videos::where('project_units_id', $id)->get();
        $unit['imgs'] = $imgs;
        $unit['vids'] = $vids;
        if ($unit) {
            return response()->json(['status' => 200, 'message' => 'Results found', 'unit' => $unit]);
        } else {
            return response()->json(['status' => 400, 'message' => 'Results found', 'unit' => $unit]);
        }
    }
}
