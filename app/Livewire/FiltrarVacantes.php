<?php

namespace App\Livewire;

use App\Models\Salario;
use Livewire\Component;
use App\Models\Categoria;

class FiltrarVacantes extends Component
{
    public $termino;
    public $salario;
    public $categoria;

    protected $rules = [
        'salario' => 'nullable|numeric',
        'categoria' => 'nullable|numeric',
    ];

    public function leerDatosFormulario()
    {
        $this->validate();

        $this->dispatch('buscar', 
            termino: $this->termino,
            salario: $this->salario,
            categoria: $this->categoria
        );
    }

    public function render()
    {
        $salarios = Salario::all();
        $categorias = Categoria::all();

        return view('livewire.filtrar-vacantes', [
            'categorias' => $categorias,
            'salarios' => $salarios,
        ]);
    }
}