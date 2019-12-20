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
                    <h4>My name</h4>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            @foreach($posts as $post)
            @if('getHelp'==$post->type)
            <div class="card align-middle" style="width: 70%; ;">
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

    </div>
</div>

</div>

@endsection