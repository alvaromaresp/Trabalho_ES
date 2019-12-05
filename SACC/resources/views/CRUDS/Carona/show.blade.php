@extends('layouts.app')
@section('head')
<link rel="stylesheet" href="{{URL::asset('css/carro.css') }}"/>
@endsection
@section('content')




<div class="container" >
    <h1>Carona: </h1>
    <div class="infos-carro">
        <div>
            <div>Destino: {{$carona->local}}</div>
        </div>
        <div>
            <div>Data: {{$carona->data}}</div>
        </div>
        <div>
            <div>Hora de saída: {{$carona->horario}}</div>
        </div>
        <div>
            <div>Duração: {{$carona->duracao}}</div>
        </div>
        <div>
            <div>Carro: {{$carona->getCarro->marca}} - {{$carona->getCarro->modelo}}</div>
        </div>
        <div>
            Inscritos:
            <ul>
            @foreach($carona->getProcura as $user)
                <li>{{$user->name}}</li>
            @endforeach
            </ul>
        </div>
         <div>
            Feedbacks:
            <ul>
            @foreach($carona->getFeedbacks as $fd)

                <div class="card custom-card">


                    {{$fd->conteudo}}
                    @if($fd->getAutor->id == Auth::user()->id)
                    <div>
                        <a href="{{route('feedback.edit',$fd)}}">
                        <button class="btn">
                            <span class="fa fa-edit fa-2x show-icon"></span>
                        </button>
                        </a>
                        <form method="POST" action="{{ route('feedback.destroy',$fd) }}" >
                            @csrf
                            <input type="hidden" name="_method" value="delete" />
                            <button class="btn" type="submit">
                                <span class="fa fa-trash fa-2x show-icon"></span>
                            </button>
                        </form>
                    </div>
                    @endif
                </div>
                Escrito por: {{$fd->getAutor->name}}<br/><br/>
            @endforeach
            </ul>
        </div>
    </div>
    @if(Session::has('msg'))
        <div class="alert alert-success" role="alert">
            {{Session::get("msg")}}
        </div>
    @endisset

    @foreach ($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
            {{$error}}
        </div>
    @endforeach
</div>

@endsection
