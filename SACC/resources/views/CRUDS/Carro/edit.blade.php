@extends('layouts.app')

@section('content')

@if(Session::has('msg'))
{{Session::get("msg")}}
@endisset

@foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
@endforeach




<div class="container">
    <form method="POST" action="{{ route('carro.update',$carro->id) }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="PUT" />
        <input value="{{$carro->nome}}" type="text" name="nome" id="nome" placeholder="Nome" required/>
        <input value="{{$carro->marca}}" type="text" name="marca" id="maarca" placeholder="Marca" required/>
        <input value="{{$carro->ano}}" type="number" min="1900" max="2100" name="ano" id="ano" placeholder="Ano" required/>
        <input value="{{$carro->lugares}}" type="number" min="1" max="100" name="lugares" id="lugares" placeholder="Lugares" required/>
        Airbag: <input type="checkbox" value="1" name="airbag" id="airbag" {{$carro->airbag?'checked':''}}/>
        <input type="file" name="foto" id="foto" />
        <button type="submit">Enviar</button>
    </form>
</div>
@endsection
