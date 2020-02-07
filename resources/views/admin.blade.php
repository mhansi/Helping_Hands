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
            <div class="form-group">
                <span><button type="submit" class="btn btn-primary mb-2"><i class="fa fa-search"></i></button></span>
            </div>

        </div>
    </form>
    <span><button><a href="/users">Users</a></button></span>

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
                <h6>{{$post->report}}</h6>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Delete
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                               Do you want to delete this post
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                <button type="button" class="btn btn-primary"><a href="/delete/{{$post->id}}" style="color:white">Yes</a></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            </br>
        </div>




        @endforeach
    </div>
</div>
@endsection