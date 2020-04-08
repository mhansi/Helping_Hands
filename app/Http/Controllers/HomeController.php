<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use DB;
use App\Report;
use App\Message;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use SebastianBergmann\Environment\Console;
use Illuminate\Support\Facades\Input;
use Session;

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

        $user = User::find(Auth::user()->id);
        $user->active=1;
        $user->update();

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
            'description'=>'required',
            'image'=>'required'

            ]);

        
        $userId = Auth::user()->id;
        $userDetails= User::find($userId);

        if ($request->hasFile('image')) {

            $imageName = $request->image->store('public');
        }

        $userDetails->name = $request['name'];
        $userDetails->description = $request['description'];
        $userDetails->image = $imageName;
      
        $userDetails->update();
        
        return redirect('userAccount');
     }
    public function posts(){
        $post = Post::orderBy('updated_at', 'desc')->get();
        return view('admin')->with('posts',$post);
    }
   
    public function users(){
        $users = User::all();
        return view('users')->with('users',$users);
    }
    public function searchedUsers(Request $request){
       $q = $request['user'];
       //$userr = User::find($user);
        // $userId= $userr->id;

        // $post = Post::find($userId);

       // $q = Input::get('user');
        $user = User::where('name', 'LIKE', '%' . $q . '%')->orWhere('email', 'LIKE', '%' . $q . '%')->get();
        if (count($user) > 0){
            return view('searchedUsers')->withDetails($user)->withQuery($q);
        }
        else return view('searchedUsers')->withMessage('No Details found. Try to search again !');

      

      // return view('searchedUsers')->with('posts',$user);
    }
    public function serchedPosts(Request $request){
        $q = $request['post'];

        $post= Post::where('title', 'LIKE', '%' . $q . '%')->orWhere('post', 'LIKE', '%' . $q . '%')->get();
        if (count($post) > 0)
            return view('searchedPosts')->withDetails($post)->withQuery($q);
        else return view('searchedPosts')->withMessage('No Details found. Try to search again !');


    }
    public function deactivate(){
        $user =User::find(Auth::user()->id);
        $user->active=0;
        $user->save();
        Auth::logout();
        Session::flush();
        return redirect('home');
    }
    public function deleteUser($userId){
       $user= User::find($userId);
       
       Post::where('user',$userId)->delete();
       //$post->delete()->all();
      Message::where('receiver_id',$userId)->delete();
       Message::where('sender_id', $userId)->delete();
        $user->delete();
       // $message1->delete()->all();
        //$message2->delete()->all();
    

       return redirect('users');
    }
}
