<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Notificaciones
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-bold text-center ">Mis Notificaciones</h1>

                    <div class="my-10 divide-y divide-gray-200 dark:divide-indigo-900">
                        @forelse ($notificaciones as $notificacion)
                            <div class="p-5 flex justify-between flex-wrap-reverse gap-4">
                                <div class="space-y-2">
                                    <p>
                                        Tienes Un Nuevo Candidato en:
                                        <span class="font-bold">{{ $notificacion->data['vacante_nombre'] }}</span>
                                    </p>
                                
                                    <p class="text-sm">
                                        {{ $notificacion->created_at->diffForHumans() }}
                                    </p>
                                </div>

                                <div>
                                    <a href="{{ route('candidatos.index', $notificacion->data['vacante_id']) }}" class="text-gray-500 dark:text-indigo-300">Ver Candidatos</a>
                                </div>
                            </div>
                        @empty
                            <p class="text-center text-gray-600 dark:text-gray-100">No Hay Notificaciones Nuevas</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>