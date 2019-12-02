<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/bootstrap.min.css')}}"/>
    @yield('head')
</head>
<body style="background-image: url({{ URL::asset('img/street.jpg' )}})">
    <div id="app" style="height: 100%;">

        <nav class = "full-lenght nav_bar">
            <div class="logo">
                SACC
            </div>
            <div class="">
            @guest

                    <a class="index-links" href="{{ route('login') }}">Entrar</a>
                        @if (Route::has('register'))
                            <a class="index-links" href="{{ route('register') }}">Registrar</a>
                        @endif
            @else
                    <div>
                        <div id="linksEsq"> <!-- LINKS NA ESQUERDA -->
                        <div><a href="{{route('carona.index')}}" class="navLink {{Request::is('carona.index')? 'activeNavLink':''}}">Carona</a></div>
                        <div><a  href="{{route('carro.index')}}" class="navLink {{Request::is('carro')? 'activeNavLink':''}}">Carros</a></div>
                        <div class="dropdown">

                            <div class="btn" style="background-color: white; border-radius: 50%" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="fa fa-2x fa-user show-icon"></span>
                            </div>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                <a class="dropdown-item index-links" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                                </a>

                            </div>


                        </div>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
            @endguest
            </div>
        </nav>

        <main class="py-4" id="main">
            @yield('content')
        </main>
    </div>
    <script type="text/javascript" src="{{URL::asset('js/bootstrap.min.js')}}"></script>
</body>
</html>
