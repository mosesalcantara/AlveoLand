<?php

namespace App\Http\Controllers;

use App\Models\inquiry;
use App\Models\project_properties;
use App\Models\project_units;
use App\Models\projects;
use App\Models\visitation;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    //
    public function Project_Count()
    {
        $project = project_properties::all();
        return response()->json($project);
    }
    public function Units_Count()
    {
        $units = project_units::all();
        return response()->json($units);
    }
    public function Request_Count()
    {
        $request = visitation::where('status', 'Approved');
        return response()->json($request);
    }
    public function Inquiry_Count()
    {
        $inquiry = inquiry::all();
        return response()->json($inquiry);
    }
}
