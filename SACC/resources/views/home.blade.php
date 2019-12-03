@extends('layouts.app')

<link rel="stylesheet" href="{{URL::asset('css/dash.css') }}"/>

@section('content')
<div class="group">
    <a  href="{{route('carona.create')}}" class="button">
        Oferecer carona
    </a>

    <a href="{{route('carona.minhas')}}" class="button">
        Caronas inscritas
    </a>

    <a  href="{{route('carona.procurar')}}" class="button">
        Procurar carona
    </a>
</div>
@endsection
