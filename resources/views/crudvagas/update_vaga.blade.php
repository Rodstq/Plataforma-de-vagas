
@extends('layouts.main')

@section('title', 'Atualizar Vaga')

@section ('content')

@if(session('success'))
    <script type="text/javascript">
        alert("{{ session('success') }}");
    </script>
@endif

<h1>Atualizar Vaga</h1>

<div class="d-flex flex-column align-items-center m-3 ">
<form  class='w-50'action="{{ route('vaga.update') }}" method="POST">
        @csrf

        <input type="hidden" name="id" value="{{ $vaga->id }}">
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome', $vaga->nome) }}" required>
        </div>

        <div class="">
            <label for="cargo" class="form-label">Cargo</label>
            <input type="text" name="cargo" id="cargo" class="form-control" value="{{ old('cargo', $vaga->cargo) }}" required>
        </div>

        <div class="">
            <label for="contato" class="form-label">Contato</label>
            <input type="text" name="contato" id="contato" class="form-control" value="{{ old('contato', $vaga->contato) }}" required>
            
        </div>
        
        <div class="">
            <label for="formacao" class="form-label">Formação</label>
            <input type="text" name="formacao" id="formacao" class="form-control" value="{{ old('formacao', $vaga->formacao) }}" required>
        </div>

        <div class="">
            <label for="cnpj" class="form-label">CNPJ</label>
            <input type="text" name="cnpj" id="cnpj" class="form-control" value="{{ old('cnpj', Auth::guard('empresa')->user()->cnpj) }}" required pattern="\d{14}" readonly>
        </div>

        <div class="">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea name="descricao" id="descricao" class="form-control" rows="4" value="{{ old('descricao', $vaga->descricao) }}" required> {{ old('descricao', $vaga->descricao) }} </textarea>
        </div>

        <div class="">
            <label for="ramo" class="form-label">Ramo</label>
            <input type="text" name="ramo" id="ramo" class="form-control" value="{{ old('ramo', $vaga->ramo) }}" required>
        </div>

        <button type="submit" class="btn btn-dark my-2">Atualizar Vaga</button>
    </form>
</div>
@endsection