

@extends('layouts.main')

@section('title', 'Contatos')

@section ('content')

<h1>Esta é a página de contato</h1>
@if(10 > 5)
    <p>a condição é true</p>
@endif

<p>{{ $nome }}</p>

@if($nome == "Matheus")
    <p> O nome é {{$nome}} e ele tem {{$idade}} anos </p>
@else
    <p> O nome não é Pedro</p>
@endif

@for( $i = 0; $i < count($arr); $i++)
    <p>{{ $arr[$i]}} - {{ $i }}</p>
@endfor

@foreach($nomes as $nome)
    <p>{{ $loop->index }}</p>
    <p>{{ $nome }} </p>
@endforeach

<a href="/">Voltar</a>

@endsection


