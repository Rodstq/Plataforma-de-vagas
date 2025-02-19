
@extends('layouts.main')

@section('title', 'vaga_delete')

@section ('content')

<h1 class="">Realmente deseja deletar a vaga abaixo? </h1>
<p class="fs-3"> Nome : {{$vaga->nome}}</p>
<p class="fs-3"> Descrição :</p>
<p class="">{{$vaga->descricao}}</p>
<p class="fs-3"> Id : {{$vaga->id}}</p>

<form action="{{ route('delete_vaga', ['vagaId' => $vaga->id]) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger mx-2">Deletar</button>
</form>


@endsection