@extends('layouts.main')

@section('title', 'candidatos_vaga')

@section ('content')

<div class=" p-3 d-flex flex-column justify-content-between bg-secondary">
    <h1> Vaga : {{ $vaga->nome }}</h1>      
    
    @foreach($usuarios as $usuario)
        <div class="my-2 p-2 d-flex justify-content-between align-items-center bg-primary text-light">
            <div class="d-flex flex-column">
                <p>{{$usuario->nome}}</p>
                <p>{{$usuario->telefone}}</p>
                <p>{{$usuario->formacao}}</p>
            </div>
            <div>
                <a class="btn btn-dark " href="{{ route ('candidatos_vaga', ['id' => $usuario->cpf]) }}"> Ver Currículo </a>
            </div>      
        </div>
    @endforeach

</div>



@endsection