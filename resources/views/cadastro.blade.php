@extends('layouts.main')

@section('title', 'Cadastro')

@section ('content')

@if(session('success'))
    <script type="text/javascript">
        alert("{{ session('success') }}");
    </script>
@endif

<h1>Cadastro </h1>
<div class="d-flex flex-column align-items-center">
<form action="{{ route('usuario.create')}}" method="post" class="w-50">
    @csrf

    @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
    @endif

    <label for="cpf" class="form-label" class="form-label" >CPF:</label>
    <input type="text" name="cpf" required pattern="\d{11}" value="{{ old('cpf') }}" class="form-control">

    <label for="nome" class="form-label" >Nome:</label>
    <input type="text" name="nome" required value="{{ old('nome') }}" class="form-control">

    <label for="telefone" class="form-label" >Telefone:</label>
    <input type="text" name="telefone" required pattern="\d{11}" value="{{ old('telefone') }}" class="form-control">

    <label for="formacao" class="form-label" >Formação:</label>
    <input type="text" name="formacao" required value="{{ old('formacao') }}" class="form-control">

    <button type="submit" class="btn btn-primary my-2"> Me cadastrar </button>

</form>
</div>
@endsection

