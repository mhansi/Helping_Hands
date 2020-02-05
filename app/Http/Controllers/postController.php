<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use DB;
use App\Post;
use App\User;
use App\Message;
use App\Report;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class postController extends Controller
{
    public function store(Request $request)
    {
        

        $post = new Post;
        $userId=Auth::user()->id;

        if($request->hasFile('image')){
           
         $imageName = $request->image->store('public');
        }
           
        $post->user=$userId;
        $post->title = $request['title'];
        $post->post = $request['post'];
       
        $post->image = $imageName;
        $post->type = $request['type'];
        

       $post->save();
       $data=Post::orderBy('updated_at', 'desc')->get();
         return redirect('home')->with('posts', $data);
    }
   
    
    public function viewGetHelp(){
        return view('getHelp');
    }
    public function viewDoHelp()
    {
        return view('doHelp');
    }
    public function showGetHelp()
    {
        $data = Post::orderBy('updated_at', 'desc')->get();
        return view('getHelp')->with('posts', $data);
    }
    public function showDoHelp()
    {
        $data = Post::orderBy('updated_at', 'desc')->get();
        return view('doHelp')->with('posts', $data);
    }
    public function viewUser($user)
    {
         $data = User::findOrFail($user);
        $data2 = Post::orderBy('updated_at', 'desc')->where('user', $user)->get();

       return view('viewUser')->with('userDetails', $data)->with('posts',$data2);
       
   }
    
    public function deletePost($postId){
      $post=Post::find($postId);
      $post->delete();

        return redirect('home');
    }
   public function editPost($postId){
      $post=Post::find($postId);

        return view('editPost')->with('postDetails',$post);
    }
    public function resubmit(Request $request)
    {
        $post = Post::find($request->id);
        if ($request->hasFile('image')) {

            $imageName = $request->image->store('public');
        }
           $post->title=$request['title'];
        $post->post = $request['post'];

        $post->image = $imageName;
        $post->type = $request['type'];

        $post->update();
        return redirect('home');
    }
    public function viewMessagePanel($messageId){
        
        $messageDetails = Message::find($messageId);
        $receiverId = $messageDetails->sender_id;
        $receiverDetails = User::find($receiverId);

        $receiverId2 = $messageDetails->receiver_id;
        $senderId2 = $messageDetails->sender_id;
        $keywords = [$receiverId2, $senderId2];
        $oldMessages = Message::orderBy('updated_at', 'desc')->where(function ($query) use ($keywords) {
            foreach ($keywords as $keyword) {
                $query->orWhere('sender_id', 'like', $keyword);
            }
        })->where(function ($query) use ($keywords) {
            foreach ($keywords as $keyword) {
                $query->orWhere('receiver_id', 'like', $keyword);
            }
        })->get();

        
        return view('viewMessage')->with('messageDetails',$messageDetails)->with('receiverDetails',$receiverDetails)->with('oldMessages',  $oldMessages);
    }
    // public function viewOldMessage($messageId){
    //     $message = Message::find($messageId);
    //     $receiverId=$message->receiver_id;
    //     $senderId =$message->sender_id;
    //     $oldMessages = Message::where('receiver_id', 'LIKE', '%' . $receiverId. '%')->orWhere('sender_id', 'LIKE', '%' . $senderId . '%')->get();

    //     return view('viewMessage')->with('$oldMessages',$oldMessages);
    // }
    public function report($postId){
        $report = new Report;
       
        $post = Report::where('postId',  $postId )->first();
        
        if($post==null){
            $report->postId = $postId;
            $report->report = 1;
            $report->save();
           
        }
        if($post!=null){
            $total = $post->report;
            $sum = $total + 1;
            $post->postId = $postId;
            $post->report = $sum;
            $post->update();
        }
        
       

   


return Redirect::back();

    }
}
