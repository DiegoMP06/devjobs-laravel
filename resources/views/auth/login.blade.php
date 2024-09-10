<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Tu Email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" placeholder="Tu Password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-400 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-700 dark:text-gray-200">{{ __('Recordarme.') }}</span>
            </label>
        </div>

        <div class="flex flex-col md:flex-row items-center justify-between mt-4 gap-4 md:gap-2 my-4">
            <x-link :href="route('password.request')">
                ¿Olvidaste tu Password?
            </x-link>
            
            <x-link :href="route('register')">
                ¿No Tienes Cuenta Aun? Crear Cuenta.
            </x-link>

        </div>

        <x-primary-button class="w-full justify-center">
            {{ __('Iniciar Sesion') }}
        </x-primary-button>
    </form>
</x-guest-layout>
