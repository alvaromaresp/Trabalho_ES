<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SACC</title>

        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css') }}"/>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Cinzel&display=swap" rel="stylesheet">


    </head>
    <body>
        <nav class = "full-lenght nav_bar">
            <div class="top-left logo">
                SACC
            </div>
            @if (Route::has('login'))
                <div class="top-right">
                    <a class="index-links" href="{{ route('login') }}">Entrar</a>
                        @if (Route::has('register'))
                            <a class="index-links" href="{{ route('register') }}">Registrar</a>
                        @endif
                </div>
            @endif
        </nav>
        <div class="flex-center position-ref full-height ">

            <div class="content">
                <div class="title m-b-md">
                    <h6> Sistema de Avaliação e Cadastro de Caronas </h6>
                </div>

            </div>
        </div>
    </body>
</html>
