
@extends('layouts.main')

@section('title', 'detalhes_vaga')

@section ('content')

<div class="d-flex flex-row justify-content-between">   
        <ul class="vw-100 d-flex flex-row justify-content-end list-unstyled">
            <li><a class="btn btn-dark mx-2" href="">Criar nova vaga</a></li>
            <li><a class="btn btn-dark mx-2" href="#">Atualizar</a></li>
            <li><a class="btn btn-dark mx-2" href="#">Deletar</a></li>
            <li><a class="btn btn-dark mx-2" href="#">Fechar</a></li>
        </ul>
</div>

 <div class=" p-3 d-flex flex-column mt-3 col shadow align-items-start justify-content-between text-light border rounded-4 text-dark text-decoration-none">
    <h1> Vaga : {{ $vaga->nome }} - {{$quantidadeinscritos}} candidatos</h1>
    <p><strong>ID:</strong> {{ $vaga->id }}</p>
    <p><strong>Descrição:</strong> {{ $vaga->descricao }}</p>
    <div class="m-3 align-self-end">
        <a class="btn btn-dark" href=" {{ route('aplicar_id', ['vagaId' => $vaga->id]) }}">Me Candidatar</a>
        <a class="btn btn-dark" href="{{ route ('candidatos_vaga', ['id' => $vaga->id]) }}"> Ver Candidatos </a>
    </div>
    
</div>
@endsection