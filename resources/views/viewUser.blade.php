@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-4">
        @if($userDetails->image!='')
        <div class="card" style="width: 10rem;">
            <img src="{{ Storage::disk('local')->url($userDetails->image)}}" class="card-img-top ">
        </div>
        @endif
        <h1>{{$userDetails->name}}</h1>
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


@foreach($posts as $post)
@if($post->type=='doHelp')
<div class="card " style="width: 25rem; background-color:#9ac288; ">
    <img src="{{ Storage::disk('local')->url($post->image)}}" class="card-img-top">
    <div class="card-body">
        <h5 class="card-title">{{ $post->title }}</h5>
        <p class="card-text">{{ $post->post }}</p>
    </div>


</div>
@endif

@if($post->type!='doHelp')
<div class="card" style="width: 25rem; background-color:#cca28d ; ">
    <img src="{{ Storage::disk('local')->url($post->image)}}" class="card-img-top">
    <div class="card-body">
        <h5 class="card-title">{{ $post->title }}</h5>
        <p class="card-text">{{ $post->post }}</p>
    </div>


</div>

@endif
@endforeach
@endsection