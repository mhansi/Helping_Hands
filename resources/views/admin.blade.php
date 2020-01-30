@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Posts</h3>
    <div class="mx-auto">
        <input type='text'><span><button><i class="fa fa-search"></i></button></span><span><button><a href="/users">Users</a></button></span>
    </div>
    <br />
    <div class="row">
        @foreach($posts as $post)




        <div class="col-md-4">
            <div class="card shadow-sm mx-auto post">

                <div class="card-body">
                    <div class="info ">
                        Posted on by <a href="/viewUser/{{$post->user}}">{{$post->userr['name']}}</a> {{$post->created_at}}

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
@endsection