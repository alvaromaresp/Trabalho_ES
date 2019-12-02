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
    <h1>Caronas: </h1>

    <hr>
    <table class="table table-hover table-bordered">
        <thead><tr><th>Data</th><th>Local</th><th>Horario</th><th>Duração</th><th>Carro</th><th>Motorista</th></tr></thead>

        @foreach ($caronas as $carona)
           <tr>
               <td>{{$carona->data}}</td>
               <td>{{$carona->local}} </td>
               <td>{{$carona->horario}} </td>
               <td>{{$carona->duracao}} </td>
               <td>{{$carona->getCarro->marca}} - {{$carona->getCarro->modelo}}</td>
               <td>{{$carona->getOferece->name}}</td>

                   <td>
                       <form method="POST" action="{{ route('carona.destroy',$carona->id) }}" >
                            @csrf
                            <input type="hidden" name="_method" value="delete" />
                            <button class="btn" type="submit">
                                <span class="fa fa-trash fa-2x show-icon"></span>
                            </button>
                        </form>
                    </td>
                    
               <td><a href="{{ route('carona.edit',$carona->id) }}"><span class="fa fa-pencil-square fa-2x show-icon"></span></a></td>
               <td><a href="{{ route('carona.show', $carona->id) }}"><span class="fa fa-info fa-2x show-icon"></span></a></td>
           </tr>
        @endforeach
    </table>

</div>
@endsection
