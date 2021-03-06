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

    <div class="container">

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
   
</body>


</html>