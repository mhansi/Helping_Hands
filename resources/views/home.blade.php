@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <!-- @foreach($posts as $post)
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
    @endforeach -->
    <div class="row">
        <div class="col-md-4 col-sm-4 mx-auto">
            <div class="card mx-auto " style="background-color: rgba(0,0,0,0); border:none; position:fixed;" >
                <div class="card-title">
                    <h3 class="text-center my-2">Add your post</h3>
                </div>
                <div class="card-body">
                    <form action="/storePost" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <select class="form-control" name="type">
                                <option hidden>Type of the post</option>
                                <option value="getHelp">Get help</option>
                                <option value="doHelp">Do help</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="title" placeholder="Write your title here">
                        </div>

                        <div class="form-group">
                            <textarea class="form-control" name="post" placeholder="Write your post here"></textarea>
                        </div>

                        <div class="form-group">
                            <input class="form-control-file" name="image" type="file">
                        </div>

                        <!-- <div class="form-group">
                    <label>Category:</label>
                    <div class="checkbox">
                        <label><input type="checkbox" value="">Kidney</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="">Blood</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="">Eyes</label>
                    </div>
                </div> -->

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary mb-2">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="dropdown">

                <button class="btn btn-secondary dropdown-toggle my-2" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Messages
                </button>

                <div class="dropdown-menu scrollable-menu" aria-labelledby="dropdownMenuButton">
                    @foreach($messages as $message)
                    @if(Auth::id()==$message->receiver_id)
                    @if($message->view=='no')
                    <a class="dropdown-item " style="background-color:red" href="/viewMessage/{{$message->id}}">


                        <p>{{$message->message}}</p>
                        <!-- <a href='#'>{{$message->id}}</a> -->
                    </a>
                    @endif
                    @if($message->view=='yes')
                    <a class="dropdown-item " href="/viewMessages/{{$message->id}}">
                        <input type="hidden" value={{$message->id}}>
                        <p>{{$message->message}}</p>
                    </a>
                    @endif

                    @endif
                    @endforeach
                </div>

            </div>
        </div>
        <div class="col-md-4">
            @foreach($posts as $post)

            @if(Auth::id()==$post->user)
            @if($post->type=='doHelp')
            <div class="card" style="width: 25rem; background-color:#9ac288; ">
                <img src="{{ Storage::disk('local')->url($post->image)}}" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ $post->post }}</p>
                </div>
                <a href="/edit/{{$post->id}}">edit</a>
                <a href="/delete/{{$post->id}}">Delete</a>

            </div>
            @endif
            </br>
            @if($post->type!='doHelp')
            <div class="card shadow-sm mx-auto post" style="background-color:thistle;">
                <div class="card-body">
                    <div class="card mx-5 my-3">
                        <img src="{{ Storage::disk('local')->url($post->image)}}" class="card-img-top">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ $post->post }}</p>
                    </div>
                    <a href="/edit/{{$post->id}}">edit</a>
                    <a href="/delete/{{$post->id}}">Delete</a>

                </div>
            </div>
            @endif
            <br />
            @endif
            @endforeach
        </div>
        <div class="col-md-4">
        </div>
    </div>

    @endsection