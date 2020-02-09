@extends('layouts.app')

@section('content')

<div class="container-fluid">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <h1>To {{$receiverDetails->name}}</h1>


    <div class="scrollable">
        @foreach($oldMessages as $oldMessage)
        <div class="card ">
            @if($oldMessage->receiver_id!=Auth::user()->id)

            <div class=" card-body" style="text-align:right;">
                <h6>{{$oldMessage->message}}</h6>
            </div>
            @endif

            @if($oldMessage->receiver_id==Auth::user()->id)
            <div class="card-body" style="background-color:#d3dee3">
                <h6>{{$oldMessage->message}}</h6>
            </div>
            @endif

        </div>
        <br />
        @endforeach

    </div>

    @if($receiverDetails->active==1)
    <form method="post" action="{{ url('/sendEmail')}}">
        {{ csrf_field() }}
        <div class="form-group">

            <input type="hidden" class="form-control" name="name" value={{Auth::user()->name}}>
        </div>
        <div class="form-group">

            <input type="hidden" class="form-control " name="email" value={{$receiverDetails->email}}>
        </div>
        <div class="form-group">

            <input type="hidden" class="form-control " name="senderId" value={{Auth::user()->id}}>
        </div>
        <div class="form-group">

            <input type="hidden" class="form-control " name="receiverId" value={{$messageDetails->sender_id}}>
        </div>

        <div class="form-group">
            <textarea name="message" class="form-control" placeholder="Write Your Message Here"></textarea>
        </div>
        <div class="form-group">
            <input type="submit" name="send" value="send" class="btn btn-info">
        </div>
    </form>
    @endif
    @if($receiverDetails->active==0)
    <p class="alert alert-danger">You can't longer to reply these mesages</p>
    @endif
</div>

@endsection