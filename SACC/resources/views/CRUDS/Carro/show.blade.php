@extends('layouts.app')
@section('head')
<link rel="stylesheet" href="{{URL::asset('css/carro.css') }}"/>
@endsection
@section('content')






<div class="container">
    <div class="infos1">
        <div class="infos-carro">
            <div><h1>{{$carro->nome}}</h1></div>
            <div>Marca: {{$carro->marca}}</div>
            <div>Ano: {{$carro->ano}}</div>
            <div>Placa: {{$carro->placa}}</div>
            <div>Lugares: {{$carro->lugares}}</div>
            <div>Airbag: {{$carro->airbag?'Sim':'Não'}} </div>
        </div>
        <div>
            <img class="img-carro" src="{{ $carro->foto }}" />
        </div>

    </div>
    <div class="icons-carro">
        <a href="{{ route('carro.edit',$carro->id) }}"><span class="fa fa-pencil-square fa-2x show-icon"></span></a>
        <a type="submit" onclick="event.preventDefault(); document.getElementById('delete-form').submit();"><span class="fa fa-trash fa-2x show-icon"></span></a>
        <form method="POST" id="delete-form" action="{{ route('carro.destroy',$carro->id) }}" >
            @csrf
            <input type="hidden" name="_method" value="delete" />
        </form>
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

@endsection
