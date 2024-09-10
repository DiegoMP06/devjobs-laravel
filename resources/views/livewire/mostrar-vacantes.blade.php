<div>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        @forelse ($vacantes as $vacante)
            <div class="p-6 text-gray-900 dark:text-gray-100 border-b border-gray-200 dark:border-gray-600 flex gap-6 flex-col md:flex-row md:justify-between md:items-center">
                <div class="space-y-4">
                    <a href="{{ route('vacantes.show', $vacante->id) }}" class="text-xl font-bold">
                        {{ $vacante->titulo }}
                    </a>

                    <p class="text-sm font-bold text-gray-600 dark:text-gray-100">{{ $vacante->empresa }}</p>

                    <p class="text-sm text-gray-500 dark:text-gray-100">
                        Ultimo Dia: 
                        <span class="font-bold">{{ $vacante->formatearFecha() }}</span>
                    </p>
                </div>

                <div class="flex gap-3 items-center flex-wrap">
                    <a href="{{ route('candidatos.index', $vacante->id) }}" class="bg-white hover:bg-gray-100 dark:bg-slate-800 dark:hover:bg-slate-900 py-2 px-4 rounded-lg dark:text-white text-xs font-bold uppercase border border-gray-700 dark:border-white w-full sm:w-auto text-center">{{ $vacante->candidatos->count() }} Candidatos</a>
                    
                    <a href="{{ route('vacantes.edit', $vacante->id) }}" class="bg-blue-600 hover:bg-blue-700 dark:bg-blue-800 dark:hover:bg-blue-900 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase w-full sm:w-auto text-center">Editar</a>

                    <button type="button" wire:click="$dispatch('mostrarAlerta', {{ $vacante->id }})" class="bg-red-500 hover:bg-red-600 dark:bg-red-800 dark:hover:bg-red-900 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase w-full sm:w-auto text-center">Eliminar</button>
                </div>
            </div>
        @empty
            <p class="p-3 text-center text-sm dark:text-white">No Hay Vacantes Que Mostrar</p>
        @endforelse
    </div>

    <div class="flex justify-center mt-10">
        {{ $vacantes->links() }}
    </div>
</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        Livewire.on('mostrarAlerta', vacanteId => {
            Swal.fire({
                title: "¿Eliminar Vacante?",
                text: "Una Vacante Eliminada No Se Puede Recuperar",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Si, Eliminar",
                cancelButtonText: "No, Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.dispatch("eliminarVacante", {vacante: vacanteId});

                    Swal.fire({
                        title: "Eliminado Correctamente",
                        text: "Se Elimino La Vacante",
                        icon: "success"
                    });
                }
            });
        });
    </script>
@endpush