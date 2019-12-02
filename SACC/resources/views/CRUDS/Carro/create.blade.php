@extends('layouts.app')
@section('head')
<link rel="stylesheet" href="{{URL::asset('css/carro.css') }}"/>
@endsection
@section('content')

@if(Session::has('msg'))
{{Session::get("msg")}}
@endisset

@foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
@endforeach




<div class="container">
    <form method="POST" action="{{ route('carro.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="infos1">
            <div class="infos-carro">
                <div class="inpItens">
                    <div>Nome:</div>
                    <input class="input" type="text" name="nome" id="nome" placeholder="Nome" required/>
                </div>
                <div class="inpItens">
                    <div>Marca:</div>
                    <input class="input" type="text" name="marca" id="marca" placeholder="Marca" required/>
                </div>
                <div class="inpItens">
                    <div>Modelo:</div>
                    <input class="input" type="text" name="modelo" id="modelo" placeholder="Modelo" required/>
                </div>
                <div class="inpItens">
                    <div>Ano:</div>
                    <input class="input" type="number" min="1900" max="2100" name="ano" id="ano" placeholder="Ano" required/>
                </div>
                <div class="inpItens">
                    <div>Lugares:</div>
                    <input class="input" type="number" min="1" max="100" name="lugares" id="lugares" placeholder="Lugares" required/>
                </div>
                <div class="inpItens">
                    <div>Airbag:</div>
                    <input class="input" type="checkbox" value="1" name="airbag" id="airbag"/>
                </div>
            </div>
            <div>
                <input type="file" name="foto" id="foto" required/>
            </div>
        </div>
        <div>
            <button class="submit-button" type="submit">Enviar</button>
        </div>
    </form>
</div>
@endsection
