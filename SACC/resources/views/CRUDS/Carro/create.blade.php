@extends('layouts.app')

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
        <input type="text" name="nome" id="nome" placeholder="Nome" required/>
        <input type="text" name="marca" id="maarca" placeholder="Marca" required/>
        <input type="number" min="1900" max="2100" name="ano" id="ano" placeholder="Ano" required/>
        <input type="number" min="1" max="100" name="lugares" id="lugares" placeholder="Lugares" required/>
        Airbag: <input type="checkbox" value="1" name="airbag" id="airbag"/>
        <input type="file" name="foto" id="foto" required/>
        <button type="submit">Enviar</button>
    </form>
</div>
@endsection
