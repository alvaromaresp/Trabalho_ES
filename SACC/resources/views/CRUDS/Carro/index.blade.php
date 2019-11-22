@extends('layouts.app')

@section('content')




<div class="container">
    <h1>Seus carros:  <a href="{{ route('carro.create') }}"><spam class="fa fa-plus-square show-icon"></spam></a></h1>

    <hr>
    <table class="table table-hover table-bordered">
        <thead><tr><th>Nome</th><th>Marca</th><th>Ano</th><th>Lugares</th><th>Airbag</th></tr></thead>

        @foreach ($carros as $carro)
           <tr>
               <td>{{$carro->nome}}</td>
               <td>{{$carro->marca}} </td>
               <td>{{$carro->ano}} </td>
               <td>{{$carro->lugares}} </td>
               <td>{{$carro->airbag?'Sim':'Não'}} </td>
               <form method="POST" action="{{ route('carro.destroy',$carro->id) }}" >
                   @csrf
                   <input type="hidden" name="_method" value="delete" />
                   <td><a type="submit"><spam class="fa fa-trash fa-2x show-icon"></spam></a></td>
               </form>
               <td><a href="{{ route('carro.edit',$carro->id) }}"><spam class="fa fa-pencil-square fa-2x show-icon"></spam></a></td>
               <td><a href="{{ route('carro.show', $carro->id) }}"><spam class="fa fa-info fa-2x show-icon"></a></td>
           </tr>
        @endforeach
    </table>

</div>
@endsection
