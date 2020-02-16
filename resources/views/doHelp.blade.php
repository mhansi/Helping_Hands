@extends('layouts.app')

@section('content')
<div class="container">
    <h5>Need to make smile someone</h5>


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
    <!--  <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card mx-auto " style="background-color: rgba(0,0,0,0); border:none; position: fixed;">
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
    <!-- 
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary mb-2">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> -->
    <div class="row">
        @foreach($posts as $post)


        @if('getHelp'==$post->type)

        <div class="col-md-4">
            <div class="card shadow-sm mx-auto post">

                <div class="card-body">
                    <div class="info ">
                        Posted on by <a href="/viewUser/{{$post->user}}">{{$post->userr['name']}}</a> {{$post->created_at}}

                    </div>
                    <div class="card mx-5 my-3">
                        <img style="width: 100%; height: 40vh; object-fit: cover;" src="{{ Storage::disk('local')->url($post->image)}}" class="card-img-top">
                    </div>

                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ $post->post }}</p>
                    @if(Auth::id()!=$post->user)

                    @if(Auth::id()!=$post->user)
                    @if(in_array($post->id,$reports))
                    <a href="/unReport/{{$post->id}}">reported</a>
                    @else
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Report
                    </button>

                    <!-- Modal -->
                    <form action="/reportPost" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>

                                    </div>
                                    <input type="text" name="description" class="modal-body">
                                    <input type="hidden" name="postId" value={{$post->id}}>


                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    @endif
                    @endif

                    @endif
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