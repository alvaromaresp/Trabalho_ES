@extends('layouts.app')
@section('head')
<link rel="stylesheet" href="{{URL::asset('css/carro.css') }}"/>
@endsection
@section('content')

@foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
@endforeach


<div class="container" >
    <div class="infos-carro">
        <div class="inpItens">
            <div>Destino:</div>
            <div> {{$carona->destino}}</div>
        </div>
        <div class="inpItens">
            <div>Hora de saída:</div>
            <div> {{$carona->horaSaida}}</div>
        </div>
        <div class="inpItens">
            <div>Previsão de chegada:</div>
            <div> {{$carona->previsaoChegada}}</div>
        </div>
        <div class="inpItens">
            <div>Carro:</div>
            <div> {{$carona->carro->marca}} - {{$carona->carro->modelo}}</div>
        </div>
        <div class="inpItens">
            <div>Pessoas no cmarcaarro:</div>
            <div> {{$carona->pessoasCarro}}</div>
        </div>
        <div class="inpItens">
            <div>Animais no carro:</div>
            <div> {{$carona->animaisCarro}}</div>
        </div>
        <div class="inpItens">
            <div>Lugar para mala:</div>
            <div> {{$carona->lugarMala}}</div>
        </div>
    </div>
</div>
   
@endsection
