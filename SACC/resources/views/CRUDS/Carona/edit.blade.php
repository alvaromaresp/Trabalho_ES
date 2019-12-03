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
                <input value="{{$carona->local}}" class="input" type="text" name="local" id="destino" placeholder="Destino" required/>
            </div>
            <div class="inpItens">
                <div>Data:</div>
                <input value="{{$carona->data}}" class="input" type="date" name="data" id="data" placeholder="Data" required/>
            </div>
            <div class="inpItens">
                <div>Hora de saída:</div>
                <input value="{{$carona->horario}}" class="input" type="text" name="horario" id="horario" placeholder="Hora de saída" required/>
            </div>
            <div class="inpItens">
                <div>Duração:</div>
                <input value="{{$carona->duracao}}" class="input" type="text" name="duracao" id="Duração" placeholder="Duração" required/>
            </div>
            <div class="inpItens">
                <div>Carro:</div>
                <select name="carro" class="form-control">
                    @foreach (Auth::user()->carros as $carro)
                        <option {{$carro->id == $carona->getCarro->id?'selected':''}}  value="{{$carro->id}}">{{$carro->marca}} - {{$carro->modelo}} - {{$carro->placa}}</option>
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
    <input type="submit" class="button"/>
</form>
@endsection
