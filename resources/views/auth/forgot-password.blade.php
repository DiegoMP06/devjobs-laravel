<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-200">
        {{ __('¿Olvidaste Tu Password? Coloca tu Email de Registro y Enviaremos las Instrucciones a Seguir.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus placeholder="Email de Registro" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex flex-col md:flex-row items-center justify-between mt-4 gap-4 md:gap-2 my-4">
            <x-link :href="route('login')">
                ¿Ya Tienes Cuenta? Iniciar Sesion.
            </x-link>
            
            <x-link :href="route('register')">
                ¿No Tienes Cuenta Aun? Crear Cuenta.
            </x-link>

        </div>

        <x-primary-button class="w-full justify-center">
            {{ __('Enviar Instrucciones') }}
        </x-primary-button>
    </form>
</x-guest-layout>
