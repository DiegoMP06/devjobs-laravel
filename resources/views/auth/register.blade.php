<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nombre')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Tu Nombre" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="Tu Email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        
        <div class="mt-4">
            <x-input-label for="rol" :value="__('¿Que Tipo de Cuenta Deseas En DevJobs?')" />

            <select name="rol" id="rol" class="border-gray-300 dark:border-gray-400 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-gray-600 focus:ring-indigo-500 dark:focus:ring-gray-600 rounded-md shadow-sm w-full block mt-1">
                <option value="" selected disabled>-- Seleccione Un Rol --</option>
                <option value="1">Developer - Obtener Empleo</option>
                <option value="2">Reclutador - Publicar Empleos</option>
            </select>

            <x-input-error :messages="$errors->get('rol')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" placeholder="Tu Password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Repite tu Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" placeholder="Repite tu Password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex flex-col md:flex-row items-center justify-between mt-4 gap-4 md:gap-2 my-4">
            <x-link :href="route('login')">
                ¿Ya Tienes Cuenta? Iniciar Sesion.
            </x-link>

            <x-link :href="route('password.request')">
                ¿Olvidaste tu Password?
            </x-link>
        </div>

        <x-primary-button class="w-full justify-center">
            {{ __('Crear Cuenta') }}
        </x-primary-button>
    </form>
</x-guest-layout>