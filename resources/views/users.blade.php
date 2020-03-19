@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h3 class="col-md-1">Users</h3>
       
    </div>
    <div class="mx-auto">
        <form action="/searchedUsers" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="mx-auto row">

                <div class="form-group col-md-2">
                    <input name="user" type='text' placeholder="Search for users">
                </div>
                <div class="form-group col-md-3">
                    <span><button type="submit" class="btn btn-dark mb-2"><i class="fa fa-search"></i></button></span>
                </div>

            </div>
        </form>
       
    </div>
    <div class="row">
        @foreach($users as $user)
        @if($user->active==1)
        <div class="col-md-4 col-sm-4 col-xs-12 mx-auto my-2">
            <div class="card mx-auto shadow-sm" style="border: none; heigt: 100%;">

                <div class="card-body">
                    @if($user->image!='')
                    <div class="card" style="width: 10rem;">

                        <img src="{{ Storage::disk('local')->url($user->image)}}" class="mx-auto" style='object-fit: cover; width: 100px; height: 100px; border-radius: 50%;'>
                    </div>
                    @endif
                    @if($user->image=='')
                    <div class="card" style="width: 10rem;">

                        <img src="../images/user.png" class="mx-auto" style='object-fit: cover; width: 100px; height: 100px; border-radius: 50%;'>
                    </div>
                    @endif
                    <a href="/viewUser/{{$user->id}}">
                        <h3 class="card-title text-center">{{$user->name}}</h3>
                    </a>
                    <!-- <h6 class="card-body text-center" ><img src="url('../images/email.jpg') !important"></h6> -->

                    <a href="/deleteUser/{{$user->id}}">Delete User</a>
                </div>
            </div>
        </div>
        @endif

        @endforeach
        </row>
    </div>
    @endsection