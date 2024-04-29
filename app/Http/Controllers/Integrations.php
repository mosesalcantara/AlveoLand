<?php

namespace App\Http\Controllers;

use App\Models\gallery;
use App\Models\head;
use App\Models\images;
use App\Models\tagline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;

class Integrations extends Controller
{

    public function PrimaryLogo()
    {
        $primary = head::where('role', '1')->get();
        $pri = count($primary);
        if ($pri > 0) {
            return response()->json(['status' => 200, 'primary' => $primary]);
        } else {
            return response()->json(['status' => 400, 'message' => 'No results found']);
        }
    }
    public function SecondaryLogo()
    {
        $secondary = head::where('role', '2')->get();
        $sec = count($secondary);
        if ($sec > 0) {
            return response()->json(['status' => 200, 'primary' => $secondary]);
        } else {
            return response()->json(['status' => 400, 'message' => 'No results found']);
        }
    }

    public function Primary_Logos()
    {
        $head = head::where('role', '1')->first();
        if ($head) {
            $gallery = gallery::where('owner_id', $head->id)->first();
            if ($gallery) {
                $image = images::where('gallery_id', $gallery->id)->get();
                return response()->json($image);
            }
        } else {
            return response()->json([]);
        }
    }
    public function Secondary_Logos()
    {
        $head = head::where('role', '2')->first();
        if ($head) {
            $gallery = gallery::where('owner_id', $head->id)->first();
            if ($gallery) {
                $image = images::where('gallery_id', $gallery->id)->get();
                return response()->json($image);
            }
        } else {
            return response()->json([]);
        }
    }
    public function Create_Head(Request $request)
    {
        $rules = [
            'name' => 'required|max:255',
            'role' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['status' => 400, 'errors' => $validator->errors()]);
        }
        $integration = new head();
        $ran = mt_rand(111111111, 999999999);
        $integration->id = $ran;
        $integration->name = $request->name;
        $integration->role = $request->role;
        $saved = $integration->save();
        if ($saved) {
            return response()->json(['status' => 200, 'message']);
        } else {
            return response()->json(['status' => 400, 'message' => 'Please try again']);
        }
    }
    public function Upload_Primary_Logo(Request $request)
    {
        $rules = [
            'image' => 'required',
            'role' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['status' => 400, 'errors' => $validator->errors()]);
        }
        $gallery = new gallery();
        $primary = head::where('role', $request->role)->first();
        $galleria = gallery::where('owner_id', $primary->id)->first();
        if ($primary) {
            if ($galleria) {
                $ran = mt_rand(111111111, 999999999);
                $image = new images();
                $image->image_id = $ran;
                $image->gallery_id = $galleria->id;
                $file = $request->file('image');
                $imagename = $ran . '.' . $file->extension();
                $file->move('images', $imagename);
                $image->image_name = $imagename;
                $image->status = '0';
                $uploaded = $image->save();
                if ($uploaded) {
                    return response()->json(['status' => 200, 'message', 'message' => 'Upload image successfull']);
                } else {
                    return response()->json(['status' => 400, 'message' => 'Please try again']);
                }
            } else {
                $ran = mt_rand(111111111, 999999999);
                $gallery->id = $ran;
                $gallery->name = $primary->name;
                $gallery->owner_id = $primary->id;
                $saved = $gallery->save();
                if ($saved) {
                    DB::commit();
                    $ran = mt_rand(111111111, 999999999);
                    $gal = gallery::where('owner_id', $primary->id)->first();
                    $image = new images();
                    $image->image_id = $ran;
                    $image->gallery_id = $gal->id;
                    $file = $request->file('image');
                    $imagename = $ran . '.' . $file->extension();
                    $file->move('images', $imagename);
                    $image->image_name = $imagename;
                    $image->status = '0';
                    $uploaded = $image->save();
                    if ($uploaded) {
                        return response()->json(['status' => 200, 'message', 'message' => 'Upload image successfull']);
                    } else {
                        return response()->json(['status' => 400, 'message' => 'Please try again']);
                    }
                    return response()->json(['status' => 200, 'message']);
                } else {
                    return response()->json(['status' => 400, 'message' => 'Please try again']);
                }
            }
        } else {
            return response()->json(['status' => 400, 'message' => 'Please try again']);
        }
    }
    public function Upload_Secondary_Logo(Request $request)
    {
        $rules = [
            'image' => 'required',
            'role' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['status' => 400, 'errors' => $validator->errors()]);
        }
        $gallery = new gallery();
        $primary = head::where('role', $request->role)->first();
        $galleria = gallery::where('owner_id', $primary->id)->first();
        if ($primary) {
            if ($galleria) {
                $ran = mt_rand(111111111, 999999999);
                $image = new images();
                $image->image_id = $ran;
                $image->gallery_id = $galleria->id;
                $file = $request->file('image');
                $imagename = $ran . '.' . $file->extension();
                $file->move('images', $imagename);
                $image->image_name = $imagename;
                $image->status = '0';
                $uploaded = $image->save();
                if ($uploaded) {
                    return response()->json(['status' => 200, 'message', 'message' => 'Upload image successfull']);
                } else {
                    return response()->json(['status' => 400, 'message' => 'Please try again']);
                }
            } else {
                $ran = mt_rand(111111111, 999999999);
                $gallery->id = $ran;
                $gallery->name = $primary->name;
                $gallery->owner_id = $primary->id;
                $saved = $gallery->save();
                if ($saved) {
                    DB::commit();
                    $ran = mt_rand(111111111, 999999999);
                    $gal = gallery::where('owner_id', $primary->id)->first();
                    $image = new images();
                    $image->image_id = $ran;
                    $image->gallery_id = $gal->id;
                    $file = $request->file('image');
                    $imagename = $ran . '.' . $file->extension();
                    $file->move('images', $imagename);
                    $image->image_name = $imagename;
                    $image->status = '0';
                    $uploaded = $image->save();
                    if ($uploaded) {
                        return response()->json(['status' => 200, 'message', 'message' => 'Upload image successfull']);
                    } else {
                        return response()->json(['status' => 400, 'message' => 'Please try again']);
                    }
                    return response()->json(['status' => 200, 'message']);
                } else {
                    return response()->json(['status' => 400, 'message' => 'Please try again']);
                }
            }
        } else {
            return response()->json(['status' => 400, 'message' => 'Please try again']);
        }
    }
    public function Publish_Logo($id)
    {
        $logos = head::where('role', '1')->get();
        foreach ($logos as $logo) {
            $check = gallery::where('owner_id', $logo->id)->first();
        }
        if ($check) {
            DB::beginTransaction();
            $updated = images::where('gallery_id', $check->id)->where('status', '1')->update([
                'status' => '0'
            ]);
            if ($updated) {
                DB::commit();
                $published = images::where('image_id', $id)->where('status', '0')->update([
                    'status' => '1'
                ]);
                if ($published) {
                    DB::commit();
                    return response()->json(['status' => 200, 'message' => 'Logo Successfully update']);
                } else {
                    DB::rollBack();
                    return response()->json(['status' => 400, 'message' => 'Please try again another, something went wrong']);
                }
            } else {
                $published = images::where('image_id', $id)->where('status', '0')->update([
                    'status' => '1'
                ]);
                if ($published) {
                    DB::commit();
                    return response()->json(['status' => 200, 'message' => 'Logo Successfully update']);
                } else {
                    DB::rollBack();
                    return response()->json(['status' => 400, 'message' => 'Please try again another, something went wrong']);
                }
            }
        } else {
            return response()->json(['status' => 400, 'message' => 'No logo found']);
        }
    }
    public function UnPublish_Logo($id)
    {
        $updated = images::where('image_id', $id)->update(['status' => 0]);
        if ($updated) {
            return response()->json(['status' => 200, 'message' => 'Tagline successfully unpublished!']);
        } else {
            return response()->json(['status' => 400, 'message' => 'Please try again, Something went wrong!']);
        }
    }
    public function Display_Logo()
    {
        $logo = head::join('gallery', 'head.id', '=', 'gallery.owner_id')
            ->join('images', 'gallery.id', '=', 'images.gallery_id')->where('status', '1')->first();
        return response()->json($logo);
    }
    public function Display_Tagline()
    {
        $tagline = tagline::where('status', '1')->first();
        return response()->json($tagline);
    }
    public function Delete_Logo($id)
    {
        $deleted = images::where('image_id', $id)->delete();
        if ($deleted) {
            return response()->json(['status' => 200, 'message' => 'Logo Successfully Deleted']);
        } else {
            return response()->json(['status' => 400, 'message' => 'Please try again another, something went wrong']);
        }
    }

    public function Create_Tagline(Request $request)
    {
        $rules = [
            'tagline' => 'required|max:100',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['status' => 400, 'errors' => $validator->errors()]);
        }
        $tagline = new tagline();
        $ran = mt_rand(111111111, 999999999);
        $tagline->id = $ran;
        $tagline->tagline = $request->tagline;
        $tagline->status = '0';
        $saved = $tagline->save();
        if ($saved) {
            return response()->json(['status' => 200, 'message']);
        } else {
            return response()->json(['status' => 400, 'message' => 'Please try again']);
        }
    }

    public function Tagline_List()
    {
        $data = tagline::all();
        return response()->json($data);
    }
    public function Delete_Tagline($id)
    {
        $deleted = tagline::where('id', $id)->delete();
        if ($deleted) {
            return response()->json(['status' => 200, 'message' => 'Successful!']);
        } else {
            return response()->json(['status' => 400, 'message' => 'Failed, Please try again!']);
        }
    }

    public function UnPublish_Tagline($id)
    {
        $updated = tagline::where('id', $id)->update(['status' => 0]);
        if ($updated) {
            return response()->json(['status' => 200, 'message' => 'Tagline successfully published!']);
        } else {
            return response()->json(['status' => 400, 'message' => 'Please try again, Something went wrong!']);
        }
    }
    public function Publish_Tagline($id)
    {
        $published = tagline::where('status', '1')->first();
        if ($published) {
            $check = tagline::where('id', $published->id)->update(['status' => '0']);
            if ($check) {
                $updated = tagline::where('id', $id)->update(['status' => 1]);
                if ($updated) {
                    return response()->json(['status' => 200, 'message' => 'Tagline successfully unpublished!']);
                } else {
                    return response()->json(['status' => 400, 'message' => 'Please try again, Something went wrong!']);
                }
            } else {
                return response()->json(['status' => 400, 'message' => 'Please try again, Something went wrong!']);
            }
        } else {
            $updated = tagline::where('id', $id)->update(['status' => 1]);
            if ($updated) {
                return response()->json(['status' => 200, 'message' => 'Tagline successfully unpublished!']);
            } else {
                return response()->json(['status' => 400, 'message' => 'Please try again, Something went wrong!']);
            }
        }
    }
    public function Post_Tagline()
    {
        $tagline = tagline::where('status', '1')->first();
        return response()->json($tagline);
    }
}
