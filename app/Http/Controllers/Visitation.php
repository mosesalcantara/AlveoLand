<?php

namespace App\Http\Controllers;

use App\Models\project_properties;
use App\Models\project_units;
use App\Models\visitation as ModelsVisitation;
use Illuminate\Http\Request;

class Visitation extends Controller
{
    //
    public function Approve_Appointments()
    {
        $data = ModelsVisitation::where('status', 'Approved')->get();
        return response()->json(['approved' => $data]);
    }
    public function Pending_Appointments()
    {
        $data = ModelsVisitation::where('status', 'Pending')->get();
        return response()->json(['pending' => $data]);
    }
    public function Completed_Appointments()
    {
        $data = ModelsVisitation::where('status', 'Done')->get();
        return response()->json(['completed' => $data]);
    }
    public function Show_Appointment_Data($id)
    {
        $data = ModelsVisitation::where('id', $id)->first();
        $unit = project_units::where('id', $data->unit_id)->first();
        $project = project_properties::where('id', $unit->project_properties_id)->first();
        $data['unit'] = $unit;
        $data['project'] = $project;
        return response()->json($data);
    }
    public function Approve_Appointment($id)
    {
        ModelsVisitation::where('id', $id)->update(['status' => 'Approved']);
        return response()->json(['message' => 'Appointment successfully approved!']);
    }
    public function Decline_Appointment($id)
    {
        ModelsVisitation::where('id', $id)->update(['status' => 'Decline']);
        return response()->json(['message' => 'Appointment successfully Decline!']);
    }
    public function Complete_Appointment($id)
    {
        ModelsVisitation::where('id', $id)->update(['status' => 'Done']);
        return response()->json(['message' => 'Appointment completed!']);
    }
}
