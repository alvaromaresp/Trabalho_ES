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
    <h1>Editar:</h1>
    <hr>
    <form method="POST" action="{{ route('carro.update',$carro->id) }}" enctype="multipart/form-data">
        @csrf
        <table class="table table-hover table-bordered">
            <tr>
                <input type="hidden" name="_method" value="PUT" />
                <td><input value="{{$carro->nome}}" type="text" name="nome" id="nome" placeholder="Nome" required/></td>
                <td><input value="{{$carro->marca}}" type="text" name="marca" id="maarca" placeholder="Marca" required/></td>
                <td><input value="{{$carro->ano}}" type="number" min="1900" max="2100" name="ano" id="ano" placeholder="Ano" required/></td>
                <td><input value="{{$carro->lugares}}" type="number" min="1" max="100" name="lugares" id="lugares" placeholder="Lugares" required/></td>
                <td>Airbag: <input type="checkbox" value="1" name="airbag" id="airbag" {{$carro->airbag?'checked':''}}/></td>
                <td><input type="file" name="foto" id="foto"/></td>
            </tr>
        </table>
        <button class="submit-button" type="submit">Enviar</button>
    </form>
</div>
@endsection
