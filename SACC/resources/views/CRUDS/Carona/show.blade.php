@extends('layouts.app')
@section('head')
<link rel="stylesheet" href="{{URL::asset('css/carro.css') }}"/>
@endsection
@section('content')

@foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
@endforeach


<div class="container" > 
    <h1>Carona: </h1>
    <div class="infos-carro">
        <div>
            <div>Destino: {{$carona->local}}</div>
        </div>
        <div>
            <div>Data: {{$carona->data}}</div>
        </div>
        <div>
            <div>Hora de saída: {{$carona->horario}}</div>
        </div>
        <div>
            <div>Duração: {{$carona->duracao}}</div>
        </div>
        <div>
            <div>Carro: {{$carona->getCarro->marca}} - {{$carona->getCarro->modelo}}</div>
        </div>
    </div>
</div>
   
@endsection
