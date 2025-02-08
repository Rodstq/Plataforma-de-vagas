
@extends('layouts.main')

@section('title', 'detalhes_vaga')

@section ('content')

<div class="d-flex flex-row justify-content-between">   
        <ul class="vw-100 d-flex flex-row justify-content-end">
            <li class="mx-2 btn btn-secondary btn-outline-dark"><a class="text-decoration-none text-light"href="">Criar nova vaga</a></li>
            <li class="mx-2 btn btn-secondary btn-outline-dark"><a class="text-decoration-none text-light" href="#">Atualizar</a></li>
            <li class="mx-2 btn btn-secondary btn-outline-dark"><a class="text-decoration-none text-light" href="#">Deletar</a></li>
            <li class="mx-2 btn btn-secondary btn-outline-dark"><a class="text-decoration-none text-light" href="#">Fechar</a></li>
        </ul>
</div>

 <div class=" p-3 d-flex flex-column justify-content-between bg-secondary">
    <h1> Vaga : {{ $vaga->nome }} - {{$quantidadeinscritos}} candidatos</h1>
    <p><strong>ID:</strong> {{ $vaga->id }}</p>
    <p><strong>Descrição:</strong> {{ $vaga->descricao }}</p>
    <div class="m-3 align-self-end">
        <a class="btn btn-dark" href=" {{ route('aplicar_id', ['vagaId' => $vaga->id]) }}">Me Candidatar</a>
        <a class="btn btn-dark " href="{{ route ('candidatos_vaga', ['id' => $vaga->id]) }}"> Ver Candidatos </a>
    </div>
    
</div>
@endsection