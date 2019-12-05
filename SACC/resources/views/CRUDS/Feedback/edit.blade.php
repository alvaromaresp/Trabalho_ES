@extends('layouts.app')
@section('head')
<link rel="stylesheet" href="{{URL::asset('css/carro.css') }}"/>
@endsection
@section('content')


<div class="container" >
    <h1>Edite seu feedback: </h1>
    <form method="POST" action="{{route('feedback.update', $feedback)}}" style="display:flex;flex-direction:column;justify-content:center;align-items:center;">
        @csrf
        <input type="hidden" value="PUT" name="_method"/>
        <textarea name="conteudo"  style="width: 100%; height: 50vh;">{{$feedback->conteudo}}</textarea>
        <input type="submit" value="Editar" class="button"/>
    </form>
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
