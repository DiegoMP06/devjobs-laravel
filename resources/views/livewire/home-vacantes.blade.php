<div class="dark:text-gray-100">
    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <h3 class="font-extrabold text-4xl text-gray-800 dark:text-white mb-12">Nuestras Vacantes Disponibles</h3>

            <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg p-6 divide-y divide-gray-200 dark:divide-indigo-800">
                @forelse ($vacantes as $vacante)
                    <div class="flex md:justify-between md:items-center py-5 flex-col md:flex-row gap-4">
                        <div class="">
                            <a href="{{ route('vacantes.show', $vacante->id) }}" class="font-extrabold text-gray-600 dark:text-white">
                                {{ $vacante->titulo }}
                            </a>

                            <p class="text-base text-gray-600 dark:text-indigo-300 mb-1">{{ $vacante->empresa }}</p>

                            <p class="font-bold text-xs text-gray-600 dark:text-indigo-300">
                                Ultimo Dia Para Postularse:
                                <span class="font-normal">{{ $vacante->formatearFecha() }}</span>
                            </p>
                        </div>
                        <div class="flex justify-end">
                            <a href="{{ route('vacantes.show', $vacante->id) }}" class="bg-indigo-600 py-1 px-2 rounded-lg border-none text-sm uppercase hover:bg-indigo-700 text-gray-50">Ver Vacante</a>
                        </div>
                    </div>
                @empty
                    <p class="p-3 text-center text-sm text-gray-600 dark:text-gray-100">No Hay Vacantes Aun</p>
                @endforelse
            </div>

            <div>
                {{ $vacantes->links() }}
            </div> 
        </div>
    </div>
</div>
