@extends('layouts.app')
@section('head')
<link rel="stylesheet" href="{{URL::asset('css/carro.css') }}"/>
@endsection
@section('content')


<form method="POST" class="root">
    @csrf
    <div class="container" >
        <div class="infos-carro">
            <div class="inpItens">
                <div>Destino:</div>
                <input class="input" type="text" name="destino" id="destino" placeholder="Destino" required/>
            </div>
            <div class="inpItens">
                <div>Hora de saída:</div>
                <input class="input" type="text" name="Hora de saída" id="Hora de saída" placeholder="Hora de saída" required/>
            </div>
            <div class="inpItens">
                <div>Previsão de chegada:</div>
                <input class="input" type="text" name="Previsão de chegada" id="Previsão de chegada" placeholder="Previsão de chegada" required/>
            </div>
            <div class="inpItens">
                <div>Carro:</div>
                <select>
                    @foreach (Auth::user()->carros as $carro)
                        <option value="{{$carro->id}}">{{$carro->marca}} - {{$carro->modelo}} - {{$carro->placa}}</option>
                    @endforeach
                </select>
            </div>
            <div class="inpItens">
                <div>Pessoas no carro:</div>
                <input class="input" type="number" name="Pessoas no carro" id="Pessoas no carro" required/>
            </div>
            <div class="inpItens">
                <div>Animais no carro:</div>
                <input class="input" type="number" name="Animais no carro" id="Animais no carro" required/>
            </div>
            <div class="inpItens">
                <div>Lugar para mala:</div>
                <input class="input" type="number" name="Lugar para mala" id="Lugar para mala" required/>
            </div>
        </div>
    </div>
    <input type="submit" class="button"/>
</form>
@endsection
