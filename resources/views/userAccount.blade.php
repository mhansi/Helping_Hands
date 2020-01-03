@extends('layouts.app')

@section('content')
<div class="card" style="width: 18rem;">
    <img src="{{ Storage::disk('local')->url(Auth::user()->image)}}" class="card-img-top ">
</div>
<form action="/updateUserAccount" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
        <input type="text" class="form-control" name="name" value={{Auth::user()->name}}>
    </div>
    <div class="form-group">
        <textarea class="form-control" name="description">{{Auth::user()->description}}</textarea>
    </div>

    <div class="form-group">
        
        <input class="form-control-file"  name="image" type="file">
    </div>



    <div class="form-group">
        <button type="submit" class="btn btn-primary mb-2">Submit</button>
    </div>



</form>
@endsection