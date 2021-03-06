@extends('layouts.app')
@section('head')
<link rel="stylesheet" href="{{URL::asset('css/carro.css') }}"/>
@endsection
@section('content')


<form method="POST" class="root" action="{{ route('carona.store') }}">
    @csrf
    <div class="container" >
        <div class="infos-carro">
            <div class="inpItens">
                <div>Destino:</div>
                <input class="input" type="text" name="local" id="local" placeholder="Destino" required/>
            </div>
            <div class="inpItens">
                <div>Data:</div>
                <input class="input" type="date" name="data" id="data" placeholder="Data" required/>
            </div>
            <div class="inpItens">
                <div>Hora de saída:</div>
                <input class="input" type="time" name="horario" id="Hora de saída" placeholder="Hora de saída" required/>
            </div>
            <div class="inpItens">
                <div>Duração:</div>
                <input class="input" type="number" name="duracao" id="duracao" placeholder="Duração" required/>
            </div>
            <div class="inpItens">
                <div>Carro:</div>
                <select name="carro" class="form-control">
                    @foreach (Auth::user()->carros as $carro)
                        <option value="{{$carro->id}}">{{$carro->marca}} - {{$carro->modelo}} - {{$carro->placa}}</option>
                    @endforeach
                </select>
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
    <button type="submit" class="button" >Enviar</button>
</form>
@endsection
