<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">{{ config('app.name') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

            </ul>
            @if(auth()->user())
            <form class="form-inline my-2 my-lg-0" method="post" action="{{ route('logout') }}">
                @csrf
                <div class="mr-4">
                    {{ __("Bienvenido   :name ", ['name' => auth()->user()->name] ) }}
                </div>
                <button class="btn btn-outline-success my-2 my-sm-0 " type="submit">Cerrar Sesion</button>
            </form>
            @endif
            @guest
            {{--<button class="" type="submit">Registrarse</button>--}}
             <a class="btn btn-outline-success my-2 my-sm-0 mr-3" href="/">Sign in</a>
            <a class="btn btn-outline-success my-2 my-sm-0" href="{{ route('register') }}">Sign up</a>
            @endguest
         </div>
        </nav>


    <div class="container">
        @if(session('message'))
            {{--Como ves se paso
                0               1
            ['success', __("Foro creado correctamente")]);--}}
            <div class="alert alert-{{ session('message')[0] }}">
                {{ session('message')[1] }}
            </div>
        @endif
        @yield('content')
    </div>

</body>
</html>