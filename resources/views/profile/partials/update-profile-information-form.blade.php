@extends('layouts.main')

@section('title', 'Atualizar Perfil')

@section('content')
    @if(session('status'))
        <script type="text/javascript">
            alert("{{ session('status') }}");
        </script>
    @endif

    <h1>Atualizar Perfil</h1>

    <div class="d-flex flex-column align-items-center m-3">
        <form class='w-50' action="{{ route('profile.update') }}" method="POST">
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
                <label for="nome" class="form-label">Nome</label>
                <input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome', $user->nome) }}" required>
            </div>

            <!-- Telefone -->
            <div class="mb-3">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="text" name="telefone" id="telefone" class="form-control" value="{{ old('telefone', $user->telefone) }}" required>
            </div>

            <!-- Formação -->
            <div class="mb-3">
                <label for="formacao" class="form-label">Formação</label>
                <input type="text" name="formacao" id="formacao" class="form-control" value="{{ old('formacao', $user->formacao) }}" required>
            </div>

            <!-- Tipo de Usuário -->
            <div class="mb-3">
                <label for="tipousuario" class="form-label">Tipo de Usuário</label>
                <input type="text" name="tipousuario" id="tipousuario" class="form-control" value="{{ old('tipousuario', $user->tipousuario) }}" required>
            </div>

            <button type="submit" class="btn btn-primary my-2">Atualizar Perfil</button>
        </form>
    </div>
@endsection
