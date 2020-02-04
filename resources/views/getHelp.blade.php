@extends('layouts.app')

@section('content')

<div class="container">
    <h5>Need some kind hearts</h5>
    <div class="row">
        @foreach($posts as $post)


        @if('doHelp'==$post->type)

        <div class="col-md-4">
            <div class="card shadow-sm mx-auto post">

                <div class="card-body">
                    <div class="info ">
                        Posted on by <a href="/viewUser/{{$post->user}}">{{$post->userr['name']}}</a> {{$post->created_at}}
                    </div>
                   
                    <div class="info" style="float:right;">
                        <a href="/report/{{$post->id}}">Report</a>
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
        @endif



        @endforeach
    </div>

    @foreach($posts as $post)
    @if('doHelp'==$post->type)
    <div class="card" style="width: 25rem;">

        <div class="info ">
            Posted by <a href="/viewUser/{{$post->user}}">{{$post->userr['name']}}</a> on {{$post->created_at}}
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