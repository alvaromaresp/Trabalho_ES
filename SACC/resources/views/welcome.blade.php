<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SACC</title>

        <!-- Fonts -->
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/welcome.css') }}"/>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">


        <!-- Styles -->

    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Registrar</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    SACC
                </div>

                <div class="title m-b-md">
                    <h6> Sistema de Avaliação e Cadastro de Caronas </h6>
                </div>

            </div>
        </div>
    </body>
</html>
