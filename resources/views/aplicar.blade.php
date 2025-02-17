
@extends('layouts.main')

@section('title', 'Cadastro')

@section ('content')

<h1> {{ $vagaNome }} </h1> 

<h3>Descrição</h3>

<p> {{$vagaDesc}}</p>

<form action="{{ route('resumes.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <!-- Pass vaga_id dinamicamente -->
    <input type="hidden" name="vaga_id" value="{{ $vagaId }}"> <!-- $vagaId passado do controlador -->

    <label for="resume">Upload Resume (PDF only)</label>
    <input type="file" name="resume" accept=".pdf" required>

    <button type="submit">Me candidatar</button>
</form>

@endsection
