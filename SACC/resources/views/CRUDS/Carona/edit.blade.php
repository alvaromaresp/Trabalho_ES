@extends('layouts.app')
@section('head')
<link rel="stylesheet" href="{{URL::asset('css/carro.css') }}"/>
@endsection
@section('content')


<form method="POST" class="root" action="{{ route('carona.update', $carona) }}" >
    @csrf
    <input type="hidden" name="_method" value="PUT" />
    <div class="container" >
        <div class="infos-carro">
            <div class="inpItens">
                <div>Destino:</div>
                <input value="{{$carona->destino}}" class="input" type="text" name="destino" id="destino" placeholder="Destino" required/>
            </div>
            <div class="inpItens">
                <div>Hora de saída:</div>
                <input value="{{$carona->horaSaida}}" class="input" type="text" name="Hora de saída" id="Hora de saída" placeholder="Hora de saída" required/>
            </div>
            <div class="inpItens">
                <div>Previsão de chegada:</div>
                <input value="{{$carona->previsaoChegada}}" class="input" type="text" name="Previsão de chegada" id="Previsão de chegada" placeholder="Previsão de chegada" required/>
            </div>
            <div class="inpItens">
                <div>Carro:</div>
                <select>
                    @foreach ($carros as $carro)
                        <option @if ($carro->id == $carona->carro) selected @endif value="{{$carro->id}}">{{$carro->marca}} - {{$carro->modelo}} - {{$carro->placa}}</option>
                    @endforeach
                </select>
            </div>
            <div class="inpItens">
                <div>Pessoas no carro:</div>
                <input value="{{$carona->pessoasCarro}}" class="input" type="number" name="Pessoas no carro" id="Pessoas no carro" required/>
            </div>
            <div class="inpItens">
                <div>Animais no carro:</div>
                <input value="{{$carona->animaisCarro}}" class="input" type="number" name="Animais no carro" id="Animais no carro" required/>
            </div>
            <div class="inpItens">
                <div>Lugar para mala:</div>
                <input value="{{$carona->lugarMala}}" class="input" type="number" name="Lugar para mala" id="Lugar para mala" required/>
            </div>
        </div>
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
    <input type="submit" class="button"/>
</form>
@endsection
