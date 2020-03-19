@extends('layouts.app')

@section('content')
@if($userDetails->active==1)
<div class="container">

    <div class="row">

        <div class="col-md-4 col-sm-4 col-xs-12 mx-auto my-2">
            <div class="card mx-auto shadow-sm" style="border: none; heigt: 100%;">

                <div class="card-body">
                    @if($userDetails->image!='')
                    <div class="mx-auto" style="width: 10rem; ">

                        <img src="{{ Storage::disk('local')->url($userDetails->image)}}" style='object-fit: cover; width: 100px; height: 100px; border-radius: 50%;'>
                    </div>
                    @endif
                    @if($userDetails->image=='')
                    <div class="text-center">
                        <img src="../images/user.png" class="mx-auto" style='object-fit: cover; width: 100px; height: 100px; border-radius: 50%;'>
                    </div>
                    @endif
                    <a href="/viewUser/{{$userDetails->id}}">
                        <h3 class="card-title text-center">{{$userDetails->name}}</h3>
                    </a>
                    <!-- <h6 class="card-body text-center" ><img src="url('../images/email.jpg') !important"></h6> -->


                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="container box">
                @if(count($errors)>0)
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">^</button>
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @if($message=Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">^</button>
                    <strong>{{ $message }}</strong>
                </div>
                @endif
                @if(Auth::user()->id!=$userDetails->id)
                <form method="post" action="{{ url('/sendEmail')}}">
                    {{ csrf_field() }}
                    <div class="form-group">

                        <input type="hidden" class="form-control" name="name" value={{Auth::user()->name}}>
                    </div>
                    <div class="form-group">

                        <input type="hidden" class="form-control " name="email" value={{$userDetails->email}}>
                    </div>
                    <div class="form-group">

                        <input type="hidden" class="form-control " name="receiverId" value={{$userDetails->id}}>
                    </div>
                    <div class="form-group">

                        <input type="hidden" class="form-control " name="senderId" value={{Auth::user()->id}}>
                    </div>
                    <div class="form-group">
                        <textarea name="message" class="form-control" placeholder="Write Your Message Here"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="send" value="send" class="btn btn-info">
                    </div>
                </form>
                @endif
            </div>
        </div>

    </div>
    <div class="row">

        @foreach($posts as $post)
        <div class="col-md-6">
            <div class="card shadow-sm mx-auto post">

                <div class="card-body">
                    <div class="info ">
                        Posted on {{$post->created_at}}
                        @if($post->type=='doHelp')
                        <p style="color:green">to Do Help</p>
                        @endif
                        @if($post->type=='getHelp')
                        <p style="color:red">to Get Help</p>
                        @endif
                    </div>
                    <div class="card mx-5 my-3">
                        <img src="{{ Storage::disk('local')->url($post->image)}}" class="card-img-top">
                    </div>

                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ $post->post }}</p>
                </div>
               

            </div>

            </br>
        </div>
        @endforeach
    </div>
</div>
@endif
@if($userDetails->active==0)
<div class="alert alert-danger">This user is not longer available</div>
@endif
@endsection