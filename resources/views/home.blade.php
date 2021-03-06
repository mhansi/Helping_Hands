@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row mx-auto">
        <div class="col-md-4 col-sm-4 col-xs-12 mx-auto my-2">
            <div class="card mx-auto shadow-sm" style="border: none; heigt: 100%;">

                <div class="card-body">
                    @if(Auth::user()->image!='')
                    <div class="text-center">
                        <img src="{{ Storage::disk('local')->url(Auth::user()->image)}}" class="mx-auto" style='object-fit: cover; width: 100px; height: 100px; border-radius: 50%;'>
                    </div>
                    @endif
                    @if(Auth::user()->image=='')
                    <div class="text-center">
                        <img src="../images/user.png" class="mx-auto" style='object-fit: cover; width: 100px; height: 100px; border-radius: 50%;'>
                    </div>
                    @endif
                    <h3 class="card-title text-center">{{Auth::user()->name}}</h3>


                    <!-- <h6 class="card-body text-center" ><img src="url('../images/email.jpg') !important"></h6> -->
                    <div class="text-center">
                        <div class="dropdown">

                            <button class="btn my-2" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-envelope fa-2x"></i>
                            </button>

                            <div class="dropdown-menu scrollable-menu" aria-labelledby="dropdownMenuButton">
                                @foreach($messages as $message)
                                @if(Auth::id()==$message->receiver_id)
                                @if($message->view=='no')
                                <a class="dropdown-item " style="background-color:#d4bcba" href="/viewMessage/{{$message->id}}">
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
        <div class="col-md-8 col-sm-8 col-xs-12 mx-auto my-2">

            <div class="card mx-auto shadow-sm" style="border: none;">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="card-body">
                    <div class="card-title">
                        <h3 class="text-center my-2">Add your post</h3>
                    </div>
                    <form action="/storePost" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row mx-auto">
                            <div class=" col-md-7">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="title" placeholder="Write your title here">
                                </div>

                                <div class="form-group">
                                    <textarea class="form-control" name="post" placeholder="Write your post here"></textarea>
                                    <small>Make sure to write a good discription</small>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <select class="form-control" name="type">
                                        <option hidden>Type of the post</option>
                                        <option value="getHelp">Get help</option>
                                        <option value="doHelp">Do help</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input class="form-control-file" name="image" type="file">
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-dark mb-2">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

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

    <!-- <div class="col-md-4 col-sm-4 mx-auto">
            <div class="card mx-auto " style="background-color: rgba(0,0,0,0); border:none; ">
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
                        </div> -->

    <!-- <div class="form-group">
                            <input type="text" class="form-control" name="title" placeholder="Write your title here">
                        </div>

                        <div class="form-group">
                            <textarea class="form-control" name="post" placeholder="Write your post here"></textarea>
                        </div>

                        <div class="form-group">
                            <input class="form-control-file" name="image" type="file">
                        </div> -->

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

    <!-- <div class="form-group">
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

            </div> -->

    <div class="col-md-12">
        <div class="row">
            @foreach($posts as $post)


            @if($post->user==Auth::id())

            <div class="col-md-4">
                <div class="card shadow-sm mx-auto post h-100">

                    <div class="card-body">
                        <div class="info ">
                            Posted on {{$post->created_at}} &nbsp; &nbsp; &nbsp; &nbsp;
                            <a href="/edit/{{$post->id}}">Edit</a> &nbsp; &nbsp;
                            <a data-toggle="modal" data-target="#exampleModal" style="color:red" href="#">Delete</a>
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Do you want to delete this post?</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>

                                        </div>


                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-secondary"><a href="/delete/{{$post->id}}">Delete</a></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

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
            @endif



            @endforeach
        </div>
    </div>

</div>

@endsection