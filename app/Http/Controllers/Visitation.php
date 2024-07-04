<?php

namespace App\Http\Controllers;

use App\Models\project_properties;
use App\Models\project_units;
use App\Models\visitation as ModelsVisitation;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Mail\Viewing;

use Carbon\Carbon;

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
        $status = ucfirst('approve') . 'd';
        $record = ModelsVisitation::find($id);
        $unit = project_properties::join('project_units', 'project_properties.id', '=', 'project_units.project_properties_id')->where('project_units.id', $record->unit_id)->first();

        $mail_data = [
            'name' => $record->full_name,
            'unit_no' => $unit['project_unit_no'],
            'property' => $unit['project_name'],
            'date' => Carbon::parse($record->date)->toFormattedDateString(),
            'time' => Carbon::createFromFormat('H:i:s', $record->time)->format('g:i a'),
            'status' => $status,
        ];

        $record->update(['status' => $status]);
        Mail::to($record->email)->send(new Viewing($mail_data));
        
        return response()->json(['message' => 'Appointment successfully approved!']);
    }
    public function Decline_Appointment($id)
    {
        $status = ucfirst('decline') . 'd';
        $record = ModelsVisitation::find($id);
        $unit = project_properties::join('project_units', 'project_properties.id', '=', 'project_units.project_properties_id')->where('project_units.id', $record->unit_id)->first();

        $mail_data = [
            'name' => $record->full_name,
            'unit_no' => $unit['project_unit_no'],
            'property' => $unit['project_name'],
            'date' => Carbon::parse($record->date)->toFormattedDateString(),
            'time' => Carbon::createFromFormat('H:i:s', $record->time)->format('g:i a'),
            'status' => $status,
        ];

        $record->update(['status' => $status]);
        Mail::to($record->email)->send(new Viewing($mail_data));
        return response()->json(['message' => 'Appointment successfully Decline!']);
    }
    public function Complete_Appointment($id)
    {
        ModelsVisitation::where('id', $id)->update(['status' => 'Done']);
        return response()->json(['message' => 'Appointment completed!']);
    }

    public function Change_Status($status, $id) {
        $status = ucfirst($status) . 'd';
        $record = ModelsVisitation::find($id);
        $unit = project_properties::join('project_units', 'project_properties.id', '=', 'project_units.project_properties_id')->where('project_units.id', $record->unit_id)->first();

        $mail_data = [
            'name' => $record->full_name,
            'unit_no' => $unit['project_unit_no'],
            'property' => $unit['project_name'],
            'date' => Carbon::parse($record->date)->toFormattedDateString(),
            'time' => Carbon::createFromFormat('H:i:s', $record->time)->format('g:i a'),
            'status' => $status,
        ];

        $record->update(['status' => $status]);
        Mail::to($record->email)->send(new Viewing($mail_data));
        
        $data = [
            'status' => $status,
        ];
        return view('admin.viewings_email')->with('data', $data);
    }
}
