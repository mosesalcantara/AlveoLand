<?php

namespace App\Http\Controllers;

use App\Models\awards as ModelsAwards;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Awards extends Controller
{
    //
    public function AwardsList()
    {
        $awards = ModelsAwards::all();
        return response()->json(['awards' => $awards]);
    }
    public function DeleteAward($id)
    {
        $deleted = ModelsAwards::where('id', $id)->delete();
        if ($deleted) {
            return response()->json(['status' => 200, 'message' => 'Successfully deleted.']);
        }
    }
    public function CreateAwards(Request $request)
    {
        $rules = [
            'awards_title' => 'required',
            'awarder' => 'required',
            'date' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['status' => 400, 'errors' => $validator->errors()]);
        }

        $awards = new ModelsAwards();
        $awards->id = mt_rand(111111111, 999999999);
        $im = mt_rand(111111111, 999999999);
        $img = $request->file('awards_image');
        $imgname = $im . '.' . $img->extension();
        $img->move('images', $imgname);
        $awards->awards_image = $imgname;
        $awards->awards_title = $request->awards_title;
        $awards->date = $request->date;
        $awards->awarder = $request->awarder;
        $saved = $awards->save();
        if ($saved) {
            return response()->json(['status' => 200, 'message' => 'Successfully saved.']);
        } else {
            return response()->json(['status' => 400, 'message' => 'Successfully saved.']);
        }
    }
}
