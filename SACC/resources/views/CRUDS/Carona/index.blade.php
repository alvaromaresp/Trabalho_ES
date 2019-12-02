@extends('layouts.app')
@section('head')
<link rel="stylesheet" href="{{URL::asset('css/carro.css') }}"/>
@endsection
@section('content')




<div class="container" >
    @if(Session::has('msg'))
        <div class="alert alert-info" role="alert">
            {{Session::get("msg")}}
        </div>
    @endif
    <h1>Seus carros:  <a href="{{ route('carro.create') }}"><span class="fa fa-plus-square show-icon"></span></a></h1>

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

                   <td>
                       <form method="POST" action="{{ route('carro.destroy',$carro->id) }}" >
                            @csrf
                            <input type="hidden" name="_method" value="delete" />
                            <button class="btn" type="submit">
                                <span class="fa fa-trash fa-2x show-icon"></span>
                            </button>
                        </form>
                    </td>
                    
               <td><a href="{{ route('carro.edit',$carro->id) }}"><span class="fa fa-pencil-square fa-2x show-icon"></span></a></td>
               <td><a href="{{ route('carro.show', $carro->id) }}"><span class="fa fa-info fa-2x show-icon"></span></a></td>
           </tr>
        @endforeach
    </table>

</div>
@endsection
