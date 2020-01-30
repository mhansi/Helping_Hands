<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Message;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $data1 = Post::orderBy('updated_at', 'desc')
            ->get();

        //    $data = Post::with('users')::orderBy('updated_at', 'desc')
        //          ->get();

          $data2 = Message::orderBy('updated_at', 'desc')->get();
        
        return view('home')->with('posts', $data1)->with('messages', $data2);
    }
    public function viewMessage($id)
    {
        $view = 'yes';
       
        $message = Message::find($id);
        $message->view = $view;
        $message->save();
        return redirect('home');
     }
     public function userAccount(){
         return view('userAccount');
     }
     public function updateUserAccount(Request $request){
        $this->validate($request, [
            'name' => 'required|max:15',
            'description'=>'required|max:100',
            'image'=>'required'

            ]);

        
        $userId = Auth::user()->id;
        $userDetails= User::find($userId);

        if ($request->hasFile('image')) {

            $imageName = $request->image->store('public');
        }

        $userDetails->name = $request['name'];;
        $userDetails->description = $request['description'];
        $userDetails->image = $imageName;
      
        $userDetails->update();
        
        return redirect('userAccount');
     }
    public function admin(){
        $post = Post::orderBy('updated_at', 'desc')->get();
        return view('admin')->with('posts',$post);
    }
   
    public function users(){
        $users = User::all();
        return view('users')->with('users',$users);
    }
}
