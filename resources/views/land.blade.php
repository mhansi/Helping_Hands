<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        html,
        body {
            background-color: #fff;
            color: white;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;

        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links>a {
            color: white;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        .img {
            /* background-image: url({{asset("/images/Land1.jpeg")}}); */
            background-image: url('../images/Land1.jpg') !important;
            height: 450px;
            filter: brightness(50%);

        }

        /* .imge { */
        /* background-image: url({{asset("/images/Land1.jpeg")}}); */
        /* background-image: url('../images/Land2.jpg') !important;
            width: 40%;
            height: 300px;
            background-repeat: no-repeat; */
        /* } */
    </style>
</head>

<body>

    <div>

        <div class="flex-center position-ref full-height img " id="app">
            @if (Route::has('login'))
            <div class="top-right links">
                @auth
                <a href="{{ url('/home') }}">Home</a>
                @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                <a href="{{ route('register') }}">Register</a>
                @endif
                @endauth
            </div>
            @endif
            <div>
                <h1>IT'S NICE TO MEET YOU</h1>
            </div>
        </div>
        <div>
            <h2>Services</h2>

        </div>

    </div>
    <div style="color:black">
        <div class="col-md-12">
            <div class="row">

                @foreach($posts as $post)

                <div class="col-md-4">
                    <div class="card shadow-sm mx-auto post h-100">

                        <div class="card-body">
                            <div class="info ">
                                Posted on {{$post->created_at}}
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




                @endforeach
            </div>
            <div class="bg-dark dark" style=""> {!! $posts->render() !!}</div>
        </div>
    </div>
    @yield('content')
    @extends('layouts.footer')
</body>

</html>