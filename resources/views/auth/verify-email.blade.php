<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-200">
        {{ __('Es Necesario Confirmar tu Cuenta Antes de Continuar, Revisa Tu Email.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-xs  bg-green-100 p-2 pl-6 text-green-700 uppercase border-l-4 border-green-700">
            {{ __('Hemos Enviado el Email de Confirmacion.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('Enviar Instrucciones') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="text-sm text-gray-600 dark:text-gray-200 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                {{ __('Cerrar Sesion') }}
            </button>
        </form>
    </div>
</x-guest-layout>
