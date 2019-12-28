@extends('layouts.app')

@section('content')

<h1>{{$userDetails->name}}</h1>
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
    <form method="post" action="{{ url('/sendEmail')}}">
        {{ csrf_field() }}
        <div class="form-group">

            <input type="hidden" class="form-control" name="name" placeholder="{{Auth::user()->name}}">
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
</div>


@endsection