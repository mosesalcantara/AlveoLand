<?php

namespace App\Http\Controllers;

use App\Models\about as ModelsAbout;
use App\Models\company_objective;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class About extends Controller
{
    //
    public function AboutList()
    {
        $mission = ModelsAbout::where('role', '0')->get();
        $vision = ModelsAbout::where('role', '1')->get();
        $company_do = ModelsAbout::where('role', '2')->get();
        $data = [
            'mission' => $mission,
            'vision' => $vision,
            'company_do' => $company_do,
        ];
        return response()->json($data);
    }
    public function CreateAbout(Request $request)
    {
        $rules = [
            'role' => 'required',
            'description' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['status' => 400, 'errors' => $validator->errors()]);
        }
        $company_do = ModelsAbout::where('role', '2')->first();
        $vision = ModelsAbout::where('role', '1')->first();
        if ($company_do && $request->role == 2) {
            return response()->json(['status' => 200, 'message' => 'Comapany do content already created.']);
        } else if ($vision && $request->role == 1) {
            return response()->json(['status' => 200, 'message' => 'Vision alreay created.']);
        } else {
            $about = new ModelsAbout();
            $about->id = mt_rand(111111111, 999999999);
            $about->description = $request->description;
            $about->role = $request->role;
            $saved = $about->save();
            if ($saved) {
                return response()->json(['status' => 200, 'message' => 'Successfully saved.']);
            } else {
                return response()->json(['status' => 400, 'message' => 'Successfully saved.']);
            }
        }
    }
    public function CreateAboutObjective(Request $request)
    {
        $rules = [
            'company_objective' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['status' => 400, 'errors' => $validator->errors()]);
        }
        $check = company_objective::first();
        if ($check) {
            return response()->json(['status' => 200, 'message' => 'Already created updated objective.']);
        } else {
            $obj = new company_objective();
            $obj->id = mt_rand(111111111, 999999999);
            $obj->company_objective = $request->company_objective;
            $saved = $obj->save();
            if ($saved) {
                return response()->json(['status' => 200, 'message' => 'Successfully saved.']);
            } else {
                return response()->json(['status' => 400, 'message' => 'Successfully saved.']);
            }
        }
    }


    public function DeleteAbout($id)
    {
        $deleted = ModelsAbout::where('id', $id)->delete();
        if ($deleted) {
            return response()->json(['status' => 200, 'message' => 'Successfully deleted.']);
        } else {
            return response()->json(['status' => 200, 'message' => 'Please try again.']);
        }
    }
    public function DisplayObjective()
    {
        $obj = company_objective::first();
        if ($obj) {
            return response()->json(['status' => 200, 'obj' => $obj]);
        } else {
            return response()->json(['status' => 400, 'message' => 'No results found']);
        }
    }
}
