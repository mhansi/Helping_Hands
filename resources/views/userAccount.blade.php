@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <a href="deactivate">Deactivate Account</a>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if(Auth::user()->image!='')
    <div class="mx-auto " style="width: 18rem;">
        <img style="border-radius: 50%;" src="{{ Storage::disk('local')->url(Auth::user()->image)}}" class="card-img-top ">
    </div>
    @endif
    @if(Auth::user()->image=='')
    <div class="mx-auto " style="width: 18rem;">
        <img style="border-radius: 50%;" src="../images/user.png" class="card-img-top ">
    </div>
    @endif
    <br />
    <form action="/updateUserAccount" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <input type="text" class="form-control" name="name" value={{Auth::user()->name}}>
        </div>
        <div class="form-group">
            <textarea class="form-control" name="description">{{Auth::user()->description}}</textarea>
        </div>

        <div class="form-group">

            <input class="form-control-file" name="image" type="file">
        </div>



        <div class="form-group">
            <button type="submit" class="btn btn-primary mb-2">Submit</button>
        </div>



    </form>
</div>
@endsection