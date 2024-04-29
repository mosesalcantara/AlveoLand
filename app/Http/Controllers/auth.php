<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class auth extends Controller
{
    //
    public function Login(Request $request)
    {
        $rules = [
            'username' => 'required',
            'password' => 'required',

        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['status' => 400, 'errors' => $validator->errors()]);
        }
        $username = $request->username;
        $password = $request->password;
        if ($username == 'admin' && $password == '1234') {
            $data = [
                'firstname' => 'Admin'
            ];
            Session::put('admin', $data);
            return response()->json(['status' => 200]);
        }
    }
    public function Logout()
    {
        Session::flush();
        return redirect('/login');
    }
}
