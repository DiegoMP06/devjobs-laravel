<div>
    <div class="mb-5">
        <h3 class="font-bold text-3xl text-gray-800 dark:text-gray-200">{{ $vacante->titulo }}</h3>
    </div>

    <div class="md:grid md:grid-cols-2 bg-gray-50 dark:bg-indigo-950 p-4 my-10">
        <p class="font-bold text-sm uppercase text-gray-800 dark:text-gray-200 my-3">Empresa: 
            <span class="normal-case font-normal">{{ $vacante->empresa }}</span>
        </p>
        
        <p class="font-bold text-sm uppercase text-gray-800 dark:text-gray-200 my-3">Ultimo dia Para Postularse: 
            <span class="normal-case font-normal">{{ $vacante->fechaString() }}</span>
        </p>

        <p class="font-bold text-sm uppercase text-gray-800 dark:text-gray-200 my-3">Categoria: 
            <span class="normal-case font-normal">{{ $vacante->categoria->categoria }}</span>
        </p>
        
        <p class="font-bold text-sm uppercase text-gray-800 dark:text-gray-200 my-3">Salario: 
            <span class="normal-case font-normal">{{ $vacante->salario->salario }}</span>
        </p>
    </div>

    <div class="md:grid md:grid-cols-3 gap-4">
        <div class="md:col-span-1">
            <img src="{{ asset('storage/vacantes/' . $vacante->imagen) }}" alt="Imagen Vacante {{ $vacante->titulo }}">
        </div>

        <div class="md:col-span-2">
            <h2 class="font-2xl font-bold mb-5">Descripcion del Puesto: </h2>

            <p>{{ $vacante->descripcion }}</p>
        </div>
    </div>

    @guest
        <div class="mt-5 bg-gray-50 dark:bg-indigo-950 border-dashed p-5 text-center">
            <p class="">
                ¿Deseas Postularte a esta Vacante?
                <a href="{{ route('register') }}" class="font-bold text-indigo-600 dark:text-indigo-300">Obten una Cuenta y Aplica a Esta u Otras Vacantes.</a>
            </p>
        </div>
    @endguest

    @auth
        @cannot('create', App\Model\Vacante::class)
            <livewire:postular-vacante :vacante="$vacante" />
        @endcannot
    @endauth
</div>