<div class="bg-gray-100 dark:bg-indigo-950 p-5 mt-10 flex flex-col justify-center items-center">
    <h3 class="text-center text-3xl font-bold my-4">Postularme a Esta Vacante</h3>

    @if(session()->has('mensaje')) 
        <p class="mb-4 font-medium text-xs w-full md:w-1/2 bg-green-100 p-2 pl-6 text-green-700 uppercase border-l-4 border-green-700">{{ session('mensaje') }}</p>
    @else
        <form action="" class="w-full md:w-1/2 mt-5" wire:submit.prevent="crearCandidato" novalidate>
            <div class="mb-4">
                <x-input-label for="cv" :value="__('Curriculum u Hoja de Vida (PDF)')" />
                <x-text-input id="cv" class="block mt-1 w-full" type="file" wire:model="cv" required autofocus autocomplete="cv" accept=".pdf" />
        
                @error('cv')
                    <livewire:mostrar-alerta :message="$message" class="mt-2" />
                @enderror
            </div>

            <x-primary-button class="w-full">
                {{ __('Postularme') }}
            </x-primary-button>
        </form>
    @endif
</div>
