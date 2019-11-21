@extends('layouts.app')

@section('content')




<div class="container">
    <h1>Todos os carros:</h1>
    <hr>
    @foreach ($carros as $carro)
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
        <a href="{{ route('carro.show', $carro->id) }}">Detalhes</a>
        <hr>
    @endforeach
</div>
@endsection
