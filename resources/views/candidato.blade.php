@extends('layouts.main')

@section('title', 'candidato')

@section ('content')

<div class="p-3 d-flex flex-column m-5 col shadow justify-content-between border rounded-4">
    
        <div class="my-2 p-2 d-flex flex-column justify-content-between">
            <div class="d-flex flex-column self-align-start">
                <p> Nome : {{$candidato->nome}} </p>
                <p> Telefone : {{$candidato->telefone}} </p>
                <p> Formação : {{$candidato->formacao}}</p>
                <p> CPF : {{$candidato->cpf}} </p>
                @if($curriculo)
                    <p><a href="{{ asset('storage/' . $curriculo->file_path) }}" target="_blank">Abrir Currículo</a></p>
                @else
                    <p>Currículo não encontrado</p>
                @endif
            </div>            
            <div class="align-self-end">
            <a class="btn btn-dark " href=""> Aceitar </a>
            <a class="btn btn-dark " href=""> Rejeitar </a>
        </div>  
        </div>

         
</div>



@endsection