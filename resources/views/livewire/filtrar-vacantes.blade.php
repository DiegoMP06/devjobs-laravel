<div class="bg-gray-100 dark:bg-gray-900 py-10">
    <h2 class="text-2xl md:text-4xl text-gray-600 dark:text-gray-100 text-center font-extrabold my-5">Buscar y Filtrar Vacantes</h2>

    <div class="max-w-7xl mx-auto">
        <form wire:submit.prevent="leerDatosFormulario">
            <div class="md:grid md:grid-cols-3 gap-5">
                <div class="mb-5">
                    <label 
                        class="block mb-1 text-sm text-gray-700 dark:text-indigo-100 uppercase font-bold "
                        for="termino">Término de Búsqueda
                    </label>
                    <input 
                        wire:model="termino"
                        id="termino"
                        type="text"
                        placeholder="Buscar por Término: ej. Laravel"
                        class="border-gray-300 dark:border-gray-400 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-gray-600 focus:ring-indigo-500 dark:focus:ring-gray-600 rounded-md shadow-sm w-full block mt-1"
                    />
                </div>

                <div class="mb-5">
                    <label for="categoria" class="block mb-1 text-sm text-gray-700 dark:text-indigo-100 uppercase font-bold">Categoría</label>

                    <select wire:model="categoria" id="categoria" class="border-gray-300 dark:border-gray-400 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-gray-600 focus:ring-indigo-500 dark:focus:ring-gray-600 rounded-md shadow-sm w-full block mt-1">
                        <option value="">--Seleccione--</option>
            
                        @foreach ($categorias as $categoria )
                            <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
                        @endforeach
                    </select>

                    @error('categoria')
                        <livewire:mostrar-alerta :message="$message" />
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="salario" class="block mb-1 text-sm text-gray-700 dark:text-indigo-100 uppercase font-bold">Salario Mensual</label>

                    <select wire:model="salario" id="salario" class="border-gray-300 dark:border-gray-400 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-gray-600 focus:ring-indigo-500 dark:focus:ring-gray-600 rounded-md shadow-sm w-full block mt-1">
                        <option  value="">-- Seleccione --</option>
                        @foreach ($salarios as $salario)
                            <option value="{{ $salario->id }}">{{$salario->salario}}</option>
                        @endforeach
                    </select>

                    @error('salario')
                        <livewire:mostrar-alerta :message="$message" />
                    @enderror
                </div>
            </div>

            <div class="flex justify-end">
                <input 
                    type="submit"
                    class="bg-indigo-500 hover:bg-indigo-600 transition-colors text-white text-sm font-bold px-10 py-2 rounded cursor-pointer uppercase w-full md:w-auto"
                    value="Buscar"
                />
            </div>
        </form>
    </div>
</div>