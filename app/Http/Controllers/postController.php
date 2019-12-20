<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Post;
use App\User;
use App\Like;
use Illuminate\Support\Facades\Auth;
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
    public function show(){
        $data = Post::orderBy('updated_at', 'desc')->get();
       
        return view('home')->with('posts', $data);
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
}
