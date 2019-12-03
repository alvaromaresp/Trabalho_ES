@extends('layouts.app')
@section('head')
<link rel="stylesheet" href="{{URL::asset('css/carro.css') }}"/>
@endsection
@section('content')

@foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
@endforeach


<div class="container" > 
    <h1>Escreva seu feedback: </h1>
    <form method="POST" action="{{route('feedback.store', $carona)}}" style="display:flex;flex-direction:column;justify-content:center;align-items:center;">
        @csrf
        <textarea name="conteudo" style="width: 100%; height: 50vh;"></textarea>
        <input type="submit" value="Enviar" class="button"/>
    </form>
    @if(Session::has('msg'))
        <div class="alert alert-success" role="alert">
            {{Session::get("msg")}}
        </div>
    @endisset

    @foreach ($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
            {{$error}}
        </div>
    @endforeach
</div>
   
@endsection
