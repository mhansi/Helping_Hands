@extends('layouts.app')

@section('content')
<form action="/resubmit" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
        <input type="hidden" class="form-control" name="id" value="{{$postDetails->id}}">
    </div>
    <div class="form-group">
        <input type="text" class="form-control" name="title" value="{{$postDetails->title}}">
    </div>
    <div class="form-group">
        <textarea class="form-control" name="post">{{$postDetails->post}}</textarea>
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

    <div class="form-group">
        <button type="submit" class="btn btn-primary mb-2">Submit</button>
    </div>
</form>
@endsection