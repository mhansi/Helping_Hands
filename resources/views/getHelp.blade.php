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


                    <div class="card mx-5 my-3">
                        <img src="{{ Storage::disk('local')->url($post->image)}}" class="card-img-top">
                    </div>

                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ $post->post }}</p>
                    @if(Auth::id()!=$post->user)
                    @foreach($reports as $report)

                    @if($report->postId!=$post->id)
                    <!-- <a href="/reportPost" style="text-align:rigth;">Report</a> -->
                    <!-- Button trigger modal -->
                   
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Report
                    </button>

                    <!-- Modal -->
                    <form  action="/reportPost" method="POST" enctype="multipart/form-data">
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
                    @if($report->postId==$post->id)
                    <a href="/unReported">reported</a>
                    @endif
                    @endforeach
                    @endif
                </div>

            </div>

            </br>
        </div>
        @endif



        @endforeach
    </div>





</div>

@endsection