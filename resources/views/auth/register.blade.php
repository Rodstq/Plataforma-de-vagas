<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
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
            <x-input-label for="cpf" :value="__('CPF')" />
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
            <x-input-label for="nome" :value="__('Nome')" />
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
            <x-input-label for="telefone" :value="__('Telefone')" />
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
            <x-input-label for="formacao" :value="__('Formação')" />
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
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
