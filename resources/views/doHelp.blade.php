@extends('layouts.app')

@section('content')
<div class="container">

    @foreach($posts as $post)
    @if('getHelp'==$post->type)
    <div class="card align-middle" style="width: 25rem ;">
        <div class="info ">
            Posted by <a href="home/viewUser/{{$post->user}}">{{$post->userr['name']}}</a> on {{$post->created_at}}
        </div>
        <img src="{{ Storage::disk('local')->url($post->image)}}" class="card-img-top">

        <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            <p class="card-text">{{ $post->post }}</p>
        </div>
    </div>
    </br>
    @endif
    @endforeach


</div>

@endsection