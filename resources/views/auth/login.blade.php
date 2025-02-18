<x-guest-layout>
    <!-- Session Status -->
   <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Formulário de Login com CPF -->
    <form method="POST" action="{{ route('login.form') }}" id="cpfForm">
        @csrf

        <!-- CPF -->
        <div>
            <x-input-label for="cpf" :value="__('CPF')" />
            <x-text-input id="cpf" class="block mt-1 w-full" type="text" name="cpf" :value="old('cpf')" required autofocus autocomplete="cpf" />
            <x-input-error :messages="$errors->get('cpf')" class="mt-2" />
        </div>

        <!-- Número de Telefone -->
        <div class="mt-4">
            <x-input-label for="phone_number" :value="__('Número de Telefone')" />
            <x-text-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number" :value="old('phone_number')" required autocomplete="tel" />
            <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-3">{{ __('Log in') }}</x-primary-button>
        </div>
    </form>

    <form method="POST" action="{{route('login.formEmpresa')}}"  id="cnpjForm" style="display:none">
        @csrf

       
        <div>
            <x-input-label for="cnpj" :value="__('CNPJ')" />
            <x-text-input id="cnpj" class="block mt-1 w-full" type="text" name="cnpj" :value="old('cnpj')" required autofocus autocomplete="cnpj" />
            <x-input-error :messages="$errors->get('cnpj')" class="mt-2" />
        </div>

        
        <div class="mt-4">
            <x-input-label for="telefone" :value="__('telefone')" />
            <x-text-input id="telefone" class="block mt-1 w-full" type="text" name="telefone" :value="old('telefone')" required autocomplete="tel" />
            <x-input-error :messages="$errors->get('telefone')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-3">{{ __('Log in') }}</x-primary-button>
        </div>
    </form>

    <!-- Botão para alternar entre CPF e CNPJ -->
    <div class="flex justify-between mt-4">
        <button type="button" class="text-sm text-gray-600" onclick="toggleForm('cpf')">
            {{ __('Login com CPF') }}
        </button>
        <button type="button" class="text-sm text-gray-600" onclick="toggleForm('cnpj')">
        {{ __('Login com CNPJ') }}
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
