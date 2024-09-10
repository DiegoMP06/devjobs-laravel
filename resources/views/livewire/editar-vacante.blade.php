<form  class="md:w-1/2 space-y-6" wire:submit.prevent="editarVacante" enctype="multipart/form-data">

    <div>
        <x-input-label for="titulo" :value="__('Titulo')" />
        <x-text-input id="titulo" class="block mt-1 w-full" type="text" wire:model="titulo" :value="old('titulo')" required autofocus autocomplete="titulo" placeholder="Titulo de la Vacante" />

        @error('titulo')
            <livewire:mostrar-alerta :message="$message" class="mt-2" />
        @enderror
    </div>
    
    <div>
        <x-input-label for="salario" :value="__('Salario Mensual')" />
        
        <select wire:model="salario" id="salario" class="border-gray-300 dark:border-gray-400 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-gray-600 focus:ring-indigo-500 dark:focus:ring-gray-600 rounded-md shadow-sm w-full block mt-1">
            <option value="" selected disabled>-- Seleccione Un Salario --</option> 
 
            @foreach ($salarios as $salario)
                <option value="{{ $salario->id }}">{{ $salario->salario }}</option> 
            @endforeach
        </select>

        @error('salario')
            <livewire:mostrar-alerta :message="$message" class="mt-2" />
        @enderror
    </div>
    
    <div>
        <x-input-label for="categoria" :value="__('Categoria')" />
        
        <select wire:model="categoria" id="categoria" class="border-gray-300 dark:border-gray-400 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-gray-600 focus:ring-indigo-500 dark:focus:ring-gray-600 rounded-md shadow-sm w-full block mt-1">
            <option value="" selected disabled>-- Seleccione Una Categoria --</option>
            
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option> 
            @endforeach
        </select>

        @error('categoria')
            <livewire:mostrar-alerta :message="$message" class="mt-2" />
        @enderror
    </div>

    <div>
        <x-input-label for="empresa" :value="__('Empresa')" />
        <x-text-input id="empresa" class="block mt-1 w-full" type="text" wire:model="empresa" :value="old('empresa')" required autofocus autocomplete="empresa" placeholder="Nombre de la Empresa" />

        @error('empresa')
            <livewire:mostrar-alerta :message="$message" class="mt-2" />
        @enderror
    </div>
    
    <div>
        <x-input-label for="ultimo_dia" :value="__('Ultimo Dia Para Postularse')" />
        <x-text-input id="ultimo_dia" class="block mt-1 w-full" type="date" wire:model="ultimo_dia" :value="old('ultimo_dia')" required autofocus autocomplete="ultimo_dia" />

        @error('ultimo_dia')
            <livewire:mostrar-alerta :message="$message" class="mt-2" />
        @enderror
    </div>
    
    <div>
        <x-input-label for="descripcion" :value="__('Descripcion')" />
        <textarea wire:model="descripcion" id="descripcion" cols="30" rows="10" required autofocus autocomplete="descripcion" placeholder="Descripcion de la Vacante (Experiencia)." class="border-gray-300 dark:border-gray-400 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-gray-600 focus:ring-indigo-500 dark:focus:ring-gray-600 rounded-md shadow-sm w-full block mt-1 h-52 resize-none">{{ old('descripcion') }}</textarea>

        @error('descripcion')
            <livewire:mostrar-alerta :message="$message" class="mt-2" />
        @enderror
    </div>

    <div>
        <x-input-label for="imagen" :value="__('Imagen')" />
        <x-text-input id="imagen" class="block mt-1 w-full" type="file" wire:model="imagen" accept="image/*" required autofocus/>


        <div class="my-5 w-full flex gap-4 flex-col md:flex-row">
            <div class="md:w-1/2">
                Imagen Actual:
                
                <img src="{{ asset('storage/vacantes') . '/' . $imagen_previa }}" alt="Preview Imagen Vacante {{ $titulo }}">
            </div> 

            @if ($imagen)
                <div class="md:w-1/2">
                    Imagen Nueva:

                    <img src="{{ $imagen->temporaryUrl() }}" alt="Preview Imagen Vacante">
                </div>
            @endif
        </div>
        
        @error('imagen')
            <livewire:mostrar-alerta :message="$message" class="mt-2" />
        @enderror
    </div>
    

    <x-primary-button class="w-full">
        Guardar Cambios
    </x-primary-button>
</form>
