@extends('layouts.app')

@section('content')

@if(Session::has('msg'))
{{Session::get("msg")}}
@endisset

@foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
@endforeach


<div class="container">
    <h1>Carro:</h1>
    <hr>
    Nome: {{$carro->nome}} |
    Marca: {{$carro->marca}} |
    Ano: {{$carro->ano}} |
    Lugares: {{$carro->lugares}} |
    Airbag: {{$carro->airbag?'Sim':'Não'}}
    <form method="POST" action="{{ route('carro.destroy',$carro->id) }}" >
        @csrf
        <input type="hidden" name="_method" value="delete" />
        <button type="submit">Apagar</button>
    </form>


    <a href="{{ route('carro.edit',$carro->id) }}">Editar</a>
    <img src="{{ $carro->foto }}"/>
    <hr>
</div>
@endsection
