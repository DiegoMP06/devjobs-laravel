<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Mis Vacantes
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session()->has('mensaje')) 
                <p class="mb-4 font-medium text-xs  bg-green-100 p-2 pl-6 text-green-700 uppercase border-l-4 border-green-700">{{ session('mensaje') }}</p>
            @endif

            <livewire:mostrar-vacantes />
        </div>
    </div>
</x-app-layout>