@extends('layouts.app')

@section('content')
<div class="container-fluid">
    @if(Auth::user()->email!='srsmsone@gmail.com')
    <h6 style="text-align: right;" data-toggle="modal" data-target="#exampleModal"><a href="#">Deactivate Account</a> </h6>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Do you want to deactivate this account?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                <div>You can activate this account from loggin with it again. Thought you account will be deleted you post will remain.</div>



                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary"><a href="deactivate">Deactivate Account</a></button>
                </div>
            </div>
        </div>
    </div>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="row">
        <div class="col-md-4">
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
        </div>
        <div class="col-md-8">
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
    </div>
</div>
@endsection