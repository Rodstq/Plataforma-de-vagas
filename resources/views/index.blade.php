@extends('layouts.main')

@section('title', 'Início')

@section ('content')

<!-- Display success message if it exists -->
@if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
@endif

@if(Auth::guard('empresa')->check())
    <p>Logged in Empresa CNPJ: {{ Auth::guard('empresa')->user()->cnpj }}</p>
@else
    <p>No empresa logged in.</p>
@endif

<div class="d-flex flex-row justify-content-between">
    <h1> Vagas em destaque </h1>
        <ul class="d-flex flex-row list-unstyled">
        @if(Auth::guard('empresa')->check() || (Auth::check() && Auth::user()->tipousuario == 'admin'))
            <li><a class="text-decoration-none shadow btn btn-dark mx-2" href="/criar_vaga">Criar nova vaga</a></li>
        @endif
        </ul>

</div>
    <section class="row justify-content-around col-md-12 my-5">
        @foreach($vaga as $oport)
        <div class="p-3 d-flex flex-column mt-3 col shadow col-md-6 align-items-start justify-content-between text-light border rounded-4">
            <a class="text-dark text-decoration-none"href="{{ route('detalhes_vaga', ['id' => $oport->id]) }}">{{$oport->nome}}</a>
        </div>
        @endforeach
   
    </section>

@endsection