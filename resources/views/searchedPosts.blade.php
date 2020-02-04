@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Posts</h3>
    <form action="/searchedPosts" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="mx-auto">

            <div class="form-group">
                <input name="post" type='text'>
            </div>
            <span><button type="submit" class="btn btn-primary mb-2"><i class="fa fa-search"></i></button></span>

        </div>
    </form>
    <span><button><a href="/users">Users</a></button></span>
    <br />
    <div class="row">

        @if(isset($details))

        @foreach($details as $post)
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

        @endif
    </div>
</div>
@endsection