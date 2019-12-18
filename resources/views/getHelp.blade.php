@extends('layouts.app')

@section('content')

@foreach($posts as $post)

<div class="card" style="width: 18rem;">
    <img src="{{ Storage::disk('local')->url($post->image)}}" class="card-img-top">

    <div class="card-body">
        <h5 class="card-title">{{ $post->title }}</h5>
        <p class="card-text">{{ $post->post }}</p>
    </div>
</div>
</br>
@endforeach
@endsection