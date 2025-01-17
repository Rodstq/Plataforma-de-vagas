@extends('layouts.main')

@section('title', 'Usuarios')

@section ('content')

@if($id!=null)

<p> Exibindo usuario ID : {{ $id }}</p>

@endif

@if ($busca != '')

<p>O usuário está buscando por {{$busca}}</p>

@endif

<a href="/">voltar</a>

@endsection