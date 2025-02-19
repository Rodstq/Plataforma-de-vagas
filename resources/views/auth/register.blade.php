<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" id='cpfForm'>
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

        <!-- CPF -->
        <div class="mt-4">
            <x-input-label for="cpf" :value="__('cpf')" />
            <x-text-input id="cpf" class="block mt-1 w-full"
                            type="text"
                            name="cpf"
                            required
                            pattern="\d{11}"
                            value="{{ old('cpf') }}"
                            autocomplete="cpf" />
            <x-input-error :messages="$errors->get('cpf')" class="mt-2" />
        </div>

        <!-- Nome -->
        <div class="mt-4">
            <x-input-label for="nome" :value="__('nome')" />
            <x-text-input id="nome" class="block mt-1 w-full"
                            type="text"
                            name="nome"
                            required
                            value="{{ old('nome') }}"
                            autocomplete="nome" />
            <x-input-error :messages="$errors->get('nome')" class="mt-2" />
        </div>

        <!-- Telefone -->
        <div class="mt-4">
            <x-input-label for="telefone" :value="__('telefone')" />
            <x-text-input id="telefone" class="block mt-1 w-full"
                            type="text"
                            name="telefone"
                            required
                            pattern="\d{11}"
                            value="{{ old('telefone') }}"
                            autocomplete="telefone" />
            <x-input-error :messages="$errors->get('telefone')" class="mt-2" />
        </div>

        <!-- Formação -->
        <div class="mt-4">
            <x-input-label for="formacao" :value="__('formação')" />
            <x-text-input id="formacao" class="block mt-1 w-full"
                            type="text"
                            name="formacao"
                            required
                            value="{{ old('formacao') }}"
                            autocomplete="formacao" />
            <x-input-error :messages="$errors->get('formacao')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Já Cadastrado?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Me Cadastrar') }}
            </x-primary-button>
        </div>
    </form>


    <form method="POST" action="{{ route('registerEmpresa') }}" id='cnpjForm' style="display:none;">
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

        <!-- CPF -->
        <div class="mt-4">
            <x-input-label for="cnpj" :value="__('cnpj')" />
            <x-text-input id="cnpj" class="block mt-1 w-full"
                            type="text"
                            name="cnpj"
                            required
                            pattern="\d{14}"
                            value="{{ old('cnpj') }}"
                            autocomplete="cnpj" />
            <x-input-error :messages="$errors->get('cnpj')" class="mt-2" />
        </div>

        <!-- Nome -->
        <div class="mt-4">
            <x-input-label for="nome" :value="__('nome')" />
            <x-text-input id="nome" class="block mt-1 w-full"
                            type="text"
                            name="nome"
                            required
                            value="{{ old('nome') }}"
                            autocomplete="nome" />
            <x-input-error :messages="$errors->get('nome')" class="mt-2" />
        </div>

        <!-- Telefone -->
        <div class="mt-4">
            <x-input-label for="telefone" :value="__('telefone')" />
            <x-text-input id="telefone" class="block mt-1 w-full"
                            type="text"
                            name="telefone"
                            required
                            pattern="\d{11}"
                            value="{{ old('telefone') }}"
                            autocomplete="telefone" />
            <x-input-error :messages="$errors->get('telefone')" class="mt-2" />
        </div>

        <!-- Formação -->
        <div class="mt-4">
            <x-input-label for="ramo" :value="__('ramo')" />
            <x-text-input id="ramo" class="block mt-1 w-full"
                            type="text"
                            name="ramo"
                            required
                            value="{{ old('ramo') }}"
                            autocomplete="ramo" />
            <x-input-error :messages="$errors->get('ramo')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Já Cadastrado?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Me Cadastrar') }}
            </x-primary-button>
        </div>
    </form>

     <!-- Botão para alternar entre CPF e CNPJ -->
     <div class="flex justify-between mt-4">
        <button type="button" class="text-sm text-gray-600" onclick="toggleForm('cpf')">
            {{ __('Cadastrar com CPF') }}
        </button>
        <button type="button" class="text-sm text-gray-600" onclick="toggleForm('cnpj')">
        {{ __('Cadastrar com CNPJ') }}
        </button>
    </div>

    <script>
    function toggleForm(type) {
        if (type === 'cpf') {
            document.getElementById('cpfForm').style.display = 'block';
            document.getElementById('cnpjForm').style.display = 'none';
        } else {
            document.getElementById('cpfForm').style.display = 'none';
            document.getElementById('cnpjForm').style.display = 'block';
        }
    }
</script>


</x-guest-layout>
