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
        <table class="table table-hover table-bordered">
            <tr>
                <td><input type="text" name="nome" id="nome" placeholder="Nome" required/></td>
                <td><input type="text" name="marca" id="maarca" placeholder="Marca" required/></td>
                <td><input type="number" min="1900" max="2100" name="ano" id="ano" placeholder="Ano" required/></td>
                <td><input type="number" min="1" max="100" name="lugares" id="lugares" placeholder="Lugares" required/></td>
                <td>Airbag: <input type="checkbox" value="1" name="airbag" id="airbag"/></td>
                <td><input type="file" name="foto" id="foto" required/></td>
            </tr>
        </table>
        <button class="submit-button" type="submit">Enviar</button>
    </form>
</div>
@endsection
