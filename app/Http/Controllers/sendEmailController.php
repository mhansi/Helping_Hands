<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\Message;

class sendEmailController extends Controller
{
    function send(Request $request){
        $this->validate($request,[
            
            
            'message' => 'required|max:200'
        ]);
        $messages = new Message;
        $email=$request->email;
        $view='no';
      

        $messages->sender_id = $request['senderId'];
        $messages->receiver_id = $request['receiverId'];
        $messages->message = $request['message'];
        $messages->view = $view;
        $messages->save();

        $data = array(
            'name' => $request->name,
            'message' => $request->message
        );
        Mail::to($email)->send(new SendMail($data));
        return back()->with('success','Message sent');
    }
      
}
