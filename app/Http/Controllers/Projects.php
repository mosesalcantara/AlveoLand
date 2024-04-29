<?php

namespace App\Http\Controllers;

use App\Models\project_properties;
use App\Models\project_snapshots;
use App\Models\project_unit_snapshots;
use App\Models\project_unit_videos;
use App\Models\project_units;
use App\Models\project_videos;
use App\Models\projects as ModelsProjects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Projects extends Controller
{
    //
    public function ProjectList()
    {
        $projects = ModelsProjects::all();
        return response()->json(['projects' => $projects]);
    }
    public function View_Project($id)
    {
        $project_images = ModelsProjects::join('gallery', 'projects.id', '=', 'gallery.owner_id')->join('images', 'gallery.id', '=', 'images.gallery_id')->where('projects.id', $id)->get();
        $project_data = ModelsProjects::where('id', $id)->first();
        $data = [
            'project_images' => $project_images,
            'project_data' => $project_data,
        ];
        return response()->json($data);
    }

    public function Display_Projects()
    {
        $project = project_properties::all();
        if (count($project) > 0) {
            return response()->json(['status' => 200, 'message' => 'Results found', 'projects' => $project]);
        } else {
            return response()->json(['status' => 400, 'message' => 'Results found', 'projects' => $project]);
        }
    }
    public function Display_Project_Units()
    {
        $units = project_properties::join('project_units', 'project_properties.id', '=', 'project_units.project_properties_id')->select('project_units.*', 'project_properties.project_name')->get();
        if (count($units) > 0) {
            return response()->json(['status' => 200, 'message' => 'Results found', 'units' => $units]);
        } else {
            return response()->json(['status' => 400, 'message' => 'Results found', 'units' => $units]);
        }
    }
    public function Create_Projects(Request $request)
    {
        $rules = [
            'project_logo' => 'required',
            'project_banner' => 'required',
            'project_name' => 'required',
            'project_tagline' => 'required',
            'province' => 'required',
            'city' => 'required',
            'barangay' => 'required',
            'street' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['status' => 400, 'errors' => $validator->errors()]);
        }
        $project = new project_properties();
        $project->project_name = ucwords($request->project_name);

        $logoo = mt_rand(111111111, 999999999);
        $bannerr = mt_rand(111111111, 999999999);
        $logo = $request->file('project_logo');
        $banner = $request->file('project_banner');
        $imagelogo = $logoo . '.' . $logo->extension();
        $imagebanner = $bannerr . '.' . $banner->extension();
        $logo->move('project/snapshots/', $imagelogo);
        $banner->move('project/snapshots/', $imagebanner);
        $project->project_tagline = ucwords($request->project_tagline);
        $project->project_logo = $imagelogo;
        $project->project_banner = $imagebanner;
        $project->province = ucfirst($request->province);
        $project->city = ucfirst($request->city);
        $project->barangay = ucfirst($request->barangay);
        $project->street = ucfirst($request->street);
        $project->status = ucfirst('Unpublished');



        $saved = $project->save();
        if ($saved) {
            return response()->json(['status' => 200, 'message' => 'New project created successfully created.']);
        } else {
            return response()->json(['status' => 400, 'message' => 'Failed to submit, something went wrong']);
        }
    }
    public function Update_Project_data(Request $request)
    {
        $rules = [
            'project_name' => 'required',
            'project_tagline' => 'required',
            'province' => 'required',
            'city' => 'required',
            'barangay' => 'required',
            'street' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['status' => 400, 'errors' => $validator->errors()]);
        }
        $project_id = $request->id;

        $logoo = mt_rand(111111111, 999999999);
        $bannerr = mt_rand(111111111, 999999999);
        $logo = $request->file('project_logo');
        $banner = $request->file('project_banner');
        if ($request->hasFile('project_logo') && $request->hasFile('project_banner')) {
            $imagelogo = $logoo . '.' . $logo->extension();
            $imagebanner = $bannerr . '.' . $banner->extension();
            $logo->move('project/snapshots/', $imagelogo);
            $banner->move('project/snapshots/', $imagebanner);
            $updated = project_properties::where('id', $project_id)->update([
                'project_name' => $request->project_name,
                'project_logo' => $imagelogo,
                'project_banner' => $imagebanner,
                'project_tagline' => $request->project_tagline,
                'province' => $request->province,
                'city' => $request->city,
                'barangay' => $request->barangay,
                'street' => $request->street,
            ]);
            if ($updated) {
                return response()->json(['status' => 200, 'message' => 'Project update successful.']);
            } else {
                return response()->json(['status' => 400, 'message' => 'Nothing has change, No updates available']);
            }
        }
        if ($request->hasFile('project_logo')) {
            $imagelogo = $logoo . '.' . $logo->extension();
            $logo->move('project/snapshots/', $imagelogo);
            $updated = project_properties::where('id', $project_id)->update([
                'project_name' => $request->project_name,
                'project_logo' => $imagelogo,
                'project_tagline' => $request->project_tagline,
                'province' => $request->province,
                'city' => $request->city,
                'barangay' => $request->barangay,
                'street' => $request->street,
            ]);
            if ($updated) {
                return response()->json(['status' => 200, 'message' => 'Project update successful.']);
            } else {
                return response()->json(['status' => 400, 'message' => 'Nothing has change, No updates available']);
            }
        }
        if ($request->hasFile('project_banner')) {
            $imagebanner = $bannerr . '.' . $banner->extension();
            $banner->move('project/snapshots/', $imagebanner);
            $updated = project_properties::where('id', $project_id)->update([
                'project_name' => $request->project_name,
                'project_banner' => $imagebanner,
                'project_tagline' => $request->project_tagline,
                'province' => $request->province,
                'city' => $request->city,
                'barangay' => $request->barangay,
                'street' => $request->street,
            ]);
            if ($updated) {
                return response()->json(['status' => 200, 'message' => 'Project update successful.']);
            } else {
                return response()->json(['status' => 400, 'message' => 'Nothing has change, No updates available']);
            }
        } else {
            $updated = project_properties::where('id', $project_id)->update([
                'project_name' => $request->project_name,
                'project_tagline' => $request->project_tagline,
                'province' => $request->province,
                'city' => $request->city,
                'barangay' => $request->barangay,
                'street' => $request->street,
            ]);
            if ($updated) {
                return response()->json(['status' => 200, 'message' => 'Project update successful.']);
            } else {
                return response()->json(['status' => 400, 'message' => 'Nothing has change, No updates available']);
            }
        }
    }

    public function Update_Project_Unit_Data(Request $request)
    {
        $rules = [
            'project_name' => 'required',
            'project_unit_no' => 'required',
            'project_unit_price' => 'required',
            'project_unit_size' => 'required',
            'project_unit_type' => 'required',
            'project_unit_category_type' => 'required',
            'project_unit_category_description' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['status' => 400, 'errors' => $validator->errors()]);
        }
        $id = $request->id;
        $ran = mt_rand(111111111, 999999999);
        $banner = $request->file('project_unit_banner');
        if ($request->hasFile('project_unit_banner')) {
            $imagebanner = $ran . '.' . $banner->extension();
            $banner->move('project/unit/snapshots/', $imagebanner);
            $updated = project_units::where('id', $id)->update([
                'project_properties_id' => $request->project_name,
                'project_unit_no' => $request->project_unit_no,
                'project_unit_price' => $request->project_unit_price,
                'project_unit_banner' => $imagebanner,
                'project_unit_size' => $request->project_unit_size,
                'project_unit_type' => $request->project_unit_type,
                'project_unit_category_type' => $request->project_unit_category_type,
                'project_unit_category_description' => $request->project_unit_category_description,
            ]);
            if ($updated) {
                return response()->json(['status' => 200, 'message' => 'Unit update successful.']);
            } else {
                return response()->json(['status' => 400, 'message' => 'Nothing change yet']);
            }
        } else {
            $updated = project_units::where('id', $id)->update([
                'project_properties_id' => $request->project_name,
                'project_unit_no' => $request->project_unit_no,
                'project_unit_price' => $request->project_unit_price,
                'project_unit_size' => $request->project_unit_size,
                'project_unit_type' => $request->project_unit_type,
                'project_unit_category_type' => $request->project_unit_category_type,
                'project_unit_category_description' => $request->project_unit_category_description,
            ]);
            if ($updated) {
                return response()->json(['status' => 200, 'message' => 'Unit update successful.']);
            } else {
                return response()->json(['status' => 400, 'message' => 'Nothing change yetnl']);
            }
        }
    }
    public function Create_Project_Units(Request $request)
    {
        $rules = [
            'project_unit_banner' => 'required',
            'project_name' => 'required',
            'project_unit_no' => 'required',
            'project_unit_type' => 'required',
            'project_unit_price' => 'required',
            'project_unit_category_description' => 'required',
            'project_unit_category_type' => 'required',
            'project_unit_size' => 'required',
            'project_unit_status' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['status' => 400, 'errors' => $validator->errors()]);
        }
        $unit = new project_units();
        $unit->project_properties_id = $request->project_name;
        $unit->project_unit_no = $request->project_unit_no;
        $ran = mt_rand(111111111, 999999999);
        $unit_banner = $request->file('project_unit_banner');
        $imagename = $ran . '.' . $unit_banner->extension();
        $unit_banner->move('project/units/snapshots', $imagename);
        $unit->project_unit_banner = $imagename;
        $unit->project_unit_type = $request->project_unit_type;
        $unit->project_unit_price = $request->project_unit_price;
        $unit->project_unit_category_type = $request->project_unit_category_type;
        $unit->project_unit_category_description = $request->project_unit_category_description;
        $unit->project_unit_size = $request->project_unit_size;
        $unit->project_unit_status = $request->project_unit_status;
        $saved = $unit->save();
        if ($saved) {
            return response()->json(['status' => 200, 'message' => 'New project created successfully created.']);
        } else {
            return response()->json(['status' => 400, 'message' => 'New project created successfully created.']);
        }
    }
    public function Delete_Project($id)
    {
        $delete_all = ModelsProjects::join('gallery', 'projects.id', '=', 'gallery.owner_id')->join('images', 'gallery.id', '=', 'images.gallery_id')->where('projects.id', $id)->delete();
        $delete_project = ModelsProjects::where('id', $id)->delete();
        $delete_gallery = ModelsProjects::join('gallery', 'projects.id', '=', 'gallery.owner_id')->where('projects.id', $id)->delete();
        if ($delete_all) {
            return response()->json(['status' => 200, 'message' => 'Successfully Deleted']);
        } else if ($delete_gallery) {
            return response()->json(['status' => 200, 'message' => 'Successfully Deleted']);
        } else if ($delete_project) {
            return response()->json(['status' => 200, 'message' => 'Successfully Deleted']);
        } else {
            return response()->json(['status' => 400, 'message' => 'Please try again']);
        }
    }
    public function UploadSnapAndVideos(Request $request)
    {
        $snaps = $request->file('snapshots');
        $vids = $request->file('videos');

        // Check if files are present
        // if (!$snaps || !$vids) {
        //     return response()->json(['status' => 400, 'message' => 'Please provide snapshots and videos']);
        // }

        $upload_snap = false;
        $upload_vid = false;

        foreach ($snaps as $snap) {
            $snapshots = new project_snapshots();
            $snapran = mt_rand(111111111, 999999999);
            $snapname = $snapran . '.' . $snap->extension();

            if (!$snap->move('project/snapshots/', $snapname)) {
                // Handle upload failure
                return response()->json(['status' => 400, 'message' => 'Snapshot upload failed']);
            }

            $snapshots->project_properties_id = $request->project_properties_id;
            $snapshots->project_snapshot_name = $snapname;
            $upload_snap = $snapshots->save();
        }

        foreach ($vids as $vid) {
            $videos = new project_videos();
            $vidran = mt_rand(111111111, 999999999);
            $vidname = $vidran . '.' . $vid->extension();
            $uploaded = $vid->move('project/videos/', $vidname);
            if (!$uploaded) {
                // Handle upload failure
                return response()->json(['status' => 400, 'message' => 'Video upload failed']);
            }

            $videos->project_properties_id = $request->project_properties_id;
            $videos->project_video_name = $vidname;
            $upload_vid = $videos->save();
        }

        if ($upload_snap || $upload_vid) {
            return response()->json(['status' => 200, 'message' => 'Upload Successful']);
        } else {
            return response()->json(['status' => 400, 'message' => 'Please try again']);
        }
    }
    public function Update_Project_Status($id)
    {
        $check = project_properties::where('id', $id)->where('status', 'Publish')->first();
        if ($check) {
            $updated = project_properties::where('id', $id)->update(['status' => 'Unpublished']);
            return response()->json(['status' => 200, 'message' => 'Unpublished successful']);
        } else {
            $updated = project_properties::where('id', $id)->update(['status' => 'Publish']);
            return response()->json(['status' => 200, 'message' => 'Published successful']);
        }
    }
    public function Update_Unit_Status($id)
    {
        $check = project_units::where('id', $id)->where('project_unit_status', 'Unavailable')->first();
        if ($check) {
            $updated = project_units::where('id', $id)->update(['project_unit_status' => 'Available']);
            return response()->json(['status' => 200, 'message' => 'Unpublished successful']);
        } else {
            $updated = project_units::where('id', $id)->update(['project_unit_status' => 'Unavailable']);
            return response()->json(['status' => 200, 'message' => 'Published successful']);
        }
    }
    public function GetProjectdata($id)
    {
        $check = project_properties::where('id', $id)->first();
        if ($check) {
            return response()->json(['status' => 200, 'project' => $check]);
        } else {
            return response()->json(['status' => 200, 'message' => 'Project not found, Please refresh your page']);
        }
    }
    public function GetProjectUnitdata($id)
    {
        $check = project_units::where('id', $id)->first();
        $check['projects'] = project_properties::all();
        if ($check) {
            return response()->json(['status' => 200, 'units' => $check]);
        } else {
            return response()->json(['status' => 200, 'message' => 'Project not found, Please refresh your page']);
        }
    }
    public function UnitUploadSnapAndVideos(Request $request)
    {
        $snaps = $request->file('snapshots');
        $vids = $request->file('videos');

        // Check if files are present
        // if (!$snaps || !$vids) {
        //     return response()->json(['status' => 400, 'message' => 'Please provide snapshots and videos']);
        // }

        $upload_snap = false;
        $upload_vid = false;

        foreach ($snaps as $snap) {
            $snapshots = new project_unit_snapshots();
            $snapran = mt_rand(111111111, 999999999);
            $snapname = $snapran . '.' . $snap->extension();

            if (!$snap->move('project/units/snapshots/', $snapname)) {
                // Handle upload failure
                return response()->json(['status' => 400, 'message' => 'Snapshot upload failed']);
            }

            $snapshots->project_units_id = $request->project_units_id;
            $snapshots->project_unit_snapshot_name = $snapname;
            $upload_snap = $snapshots->save();
        }

        foreach ($vids as $vid) {
            $videos = new project_unit_videos();
            $vidran = mt_rand(111111111, 999999999);
            $vidname = $vidran . '.' . $vid->extension();
            $uploaded = $vid->move('project/units/videos/', $vidname);
            if (!$uploaded) {
                // Handle upload failure
                return response()->json(['status' => 400, 'message' => 'Video upload failed']);
            }

            $videos->project_units_id = $request->project_units_id;
            $videos->project_unit_video_name = $vidname;
            $upload_vid = $videos->save();
        }

        if ($upload_snap || $upload_vid) {
            return response()->json(['status' => 200, 'message' => 'Upload Successful']);
        } else {
            return response()->json(['status' => 400, 'message' => 'Please try again']);
        }
    }
}
