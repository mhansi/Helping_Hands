@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-3">
            <div class="profile">
                <div>
                    <img src="../images/Land2.jpg " class="img" style="width:45%" alt="...">
                </div>
                <div>
                    <a href="/userAccount">My name</a>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            @foreach($posts as $post)

            @if(Auth::id()==$post->user)

            <div class="card" style="width: 18rem;">
                <img src="{{ Storage::disk('local')->url($post->image)}}" class="card-img-top">

                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ $post->post }}</p>
                </div>
                <a href="/edit/{{$post->id}}">edit</a>
                <a href="/delete/{{$post->id}}">Delete</a>
            </div>
            </br>
            @endif
            @endforeach
        </div>
        <div class=" col-md-4">
            <!-- <div class="card">
             

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                  

                </div> -->
            <form action="/storePost" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <input type="text" class="form-control" name="title" placeholder="Write your title here">
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="post" placeholder="Write your post here"></textarea>
                </div>

                <div class="form-group">
                    <input class="form-control-file" name="image" type="file">
                </div>
                <div class="form-group">
                    <label>Type:</label>
                    <select name="type">
                        <option value="getHelp">Get help</option>
                        <option value="doHelp">Do help</option>
                    </select>
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

            <div class="dropdown">

                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Messages
                </button>

                <div class="dropdown-menu scrollable-menu" aria-labelledby="dropdownMenuButton">
                    @foreach($messages as $message)
                    @if(Auth::id()==$message->receiver_id)
                    @if($message->view=='no')
                    <a class="dropdown-item " style="background-color:red" href="/viewMessage/{{$message->id}}">

                        <!-- <a href='#'>{{$message->id}}</a> -->
                        <p>{{$message->message}}</p>
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
    </div>
</div>




</div>

@endsection