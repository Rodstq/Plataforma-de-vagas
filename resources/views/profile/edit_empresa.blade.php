@extends('layouts.main')

@section('title', 'Atualizar Empresa')

@section ('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session('status') == 'profile-updated')
    <script type="text/javascript">
        alert("Perfil atualizado com sucesso!");
    </script>
@endif

<h1>Atualizar Perfil</h1>
<div class="d-flex flex-column align-items-center m-3">
    <form class="w-50" method="POST" action="{{ route('profile.update') }}">
        
        @csrf
        @method('PATCH')

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Nome -->
        <div class="mb-3">
            <label for="nome" class="form-label">{{ __('Nome') }}</label>
            <input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome', $user->nome) }}" required autofocus>
        </div>

        <!-- Telefone -->
        <div class="mb-3">
            <label for="telefone" class="form-label">{{ __('Telefone') }}</label>
            <input type="text" name="telefone" id="telefone" class="form-control" value="{{ old('telefone', $user->telefone) }}" required>
        </div>

        <!-- Ramo -->
        <div class="mb-3">
            <label for="ramo" class="form-label">{{ __('Ramo') }}</label>
            <input type="text" name="ramo" id="ramo" class="form-control" value="{{ old('ramo', $user->ramo) }}" required>
        </div>

        <button type="submit" class="btn btn-dark my-2">{{ __('Atualizar Perfil') }}</button>
    </form>

    <!-- Formulário para Deletar a Conta -->
    <form class="w-50 mt-4" method="POST" action="{{ route('profile.destroy') }}">
        @csrf
        @method('delete')

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <button type="submit" class="btn btn-danger my-2">{{ __('Excluir Conta') }}</button>
    </form>
</div>

@endsection
