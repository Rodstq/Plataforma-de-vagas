@extends('layouts.main')

@section('title', 'Início')

@section ('content')

<div class="d-flex flex-row justify-content-between">
    <h1> Vagas em destaque </h1>
        <ul class="d-flex flex-row">
            <li class="mx-2 btn btn-secondary btn-outline-dark"><a class="text-decoration-none text-light"href="/criarvaga">Criar nova vaga</a></li>
        </ul>
</div>
    

    <section class="d-flex flex-row justify-content-around col-md-12 mt-5">
    <div class="p-5 d-flex flex-column bg-dark col-md-4 align-items-center text-light border rounded-4">
    @foreach($vaga as $oport)
        <a class="text-light "href="{{ route('detalhesvaga', ['id' => $oport->id]) }}">{{$oport->nome}}</a>
    @endforeach
    </div>

    <div class="p-5 d-flex flex-column bg-dark col-md-4 align-items-center text-light border rounded-4">
    @foreach($vaga as $oport)
        <a class="text-light "href="{{ route('detalhesvaga', ['id' => $oport->id]) }}">{{$oport->nome}}</a>
    @endforeach
    </div>
    </section>

@endsection