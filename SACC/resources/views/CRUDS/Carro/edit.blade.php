@extends('layouts.app')
@section('head')
<link rel="stylesheet" href="{{URL::asset('css/carro.css') }}"/>
@endsection
@section('content')





<div class="container">
    <form method="POST" action="{{ route('carro.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="infos1">
            <div class="infos-carro">
                <div class="inpItens">
                    <div>Nome:</div>
                    <input value="{{$carro->nome}}" class="input" type="text" name="nome" id="nome" placeholder="Nome" required/>
                </div>
                <div class="inpItens">
                    <div>Marca:</div>
                    <input value="{{$carro->marca}}" class="input" type="text" name="marca" id="marca" placeholder="Marca" required/>
                </div>
                <div class="inpItens">
                    <div>Modelo:</div>
                    <input value="{{$carro->modelo}}" class="input" type="text" name="modelo" id="modelo" placeholder="Modelo" required/>
                </div>
                <div class="inpItens">
                    <div>Ano:</div>
                    <input value="{{$carro->ano}}" class="input" type="number" min="1900" max="2100" name="ano" id="ano" placeholder="Ano" required/>
                </div>
                <div class="inpItens">
                    <div>Lugares:</div>
                    <input value="{{$carro->lugares}}" class="input" type="number" min="1" max="100" name="lugares" id="lugares" placeholder="Lugares" required/>
                </div>
                <div class="inpItens">
                    <div>Airbag:</div>
                    <input class="input" type="checkbox" {{$carro->airbag?'checked':''}} name="airbag" id="airbag"/>
                </div>
            </div>
            <div>
                <img src="{{$carro->foto}}" alt="">
            </div>
            
        </div>
        <div>
            <button class="submit-button" type="submit">Enviar</button>
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
    </form>
</div>
@endsection
