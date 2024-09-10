<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Candidatos Vacante
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-bold text-center ">Candidatos Vacante: {{ $vacante->titulo }}</h1>

                    <div class="md:flex md:justify-center p-5 my-5">
                        <ul class="divide-y divide-gray-200 dark:divide-indigo-900 w-full">
                            @forelse ($vacante->candidatos as $candidato)
                                <li class="p-3 flex md:items-center flex-col md:flex-row gap-4">
                                    <div class="flex-1">
                                        <p class="text-xl font-medium text-gray-800 dark:text-gray-50">
                                            {{ $candidato->candidato->name }}
                                        </p>
                                        
                                        <p class="text-md text-gray-600 dark:text-gray-200">
                                            {{ $candidato->candidato->email }}
                                        </p>
                                        
                                        <p class="text-sm text-gray-600 dark:text-gray-200">
                                            {{ $candidato->created_at->diffForHumans() }}
                                        </p>
                                    </div>

                                    <div class="flex justify-end">
                                        <a href="{{ asset('storage') . '/' . $candidato->cv }}" target="_blank" rel="noreferrer noopener" class="inline-flex items-center shadow dark:shadow-white px-2.5 py-0.5 border border-gray-300 text-sm leading-5 font-medium rounded-full text-gray-700 dark:text-gray-50 bg-white dark:bg-gray-700 hover:bg-gray-800">Ver CV</a>
                                    </div>
                                </li>
                            @empty
                                <li class="text-center text-sm text-gray-600 dark:text-gray-100">No Hay Candidatos Aun</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>