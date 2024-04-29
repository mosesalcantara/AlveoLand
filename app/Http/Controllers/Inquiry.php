<?php

namespace App\Http\Controllers;

use App\Mail\send_inquery_response;
use App\Models\inquiry as ModelsInquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class Inquiry extends Controller
{

    public function Pending_Inquiry()
    { {
            $inquiry = ModelsInquiry::where('status', 'Submitted')->get();
            return response()->json(['inquiry' => $inquiry]);
        }
    }

    public function View_Inquiry($id)
    { {
            $inquiry = ModelsInquiry::where('id', $id)->first();
            return response()->json($inquiry);
        }
    }

    public function Send_Inquiry_Response(Request $request)
    {
        $rules = [
            'email' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['status' => 400, 'errors' => $validator->errors()]);
        }


        $mail = [
            'message' => $request->message
        ];
        $mail_sent = Mail::to($request->email)->send(new  send_inquery_response($mail));
        if ($mail_sent) {
            ModelsInquiry::where('id', $request->id)->update(['status' => 'Responded']);
            return response()->json(['status' => 200, 'message' => 'Message sent!']);
        } else {
            return response()->json(['status' => 400, 'message' => 'Message send failed!']);
        }
    }
}
