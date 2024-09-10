<?php

namespace App\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use Livewire\Component;
use Livewire\WithFileUploads;

class CrearVacante extends Component
{
    public $titulo;
    public $empresa;
    public $ultimo_dia;
    public $descripcion;
    public $imagen;
    public $salario = "";
    public $categoria = "";

    use WithFileUploads;
    
    protected $rules = [
        'titulo' => 'required|string',
        'empresa' => 'required|string',
        'ultimo_dia' => 'required|string|date',
        'descripcion' => 'required',
        'imagen' => 'required|image|max:1024',
        "salario" => 'required|numeric',
        'categoria' => "required|numeric",
    ];

    public function crearVacante()
    {
        $datos = $this->validate();

        $imagen = $this->imagen->store('public/vacantes');
        $datos['imagen'] = str_replace('public/vacantes/', '', $imagen);

        auth()->user()->vacantes()->create([
            'titulo' => $datos['titulo'],
            'empresa' => $datos['empresa'],
            'ultimo_dia' => $datos['ultimo_dia'],
            'descripcion' => $datos['descripcion'],
            'imagen' => $datos['imagen'],
            'salario_id' => $datos['salario'],
            'categoria_id' => $datos['categoria'],
        ]);

        session()->flash("mensaje", "La Vacante Se Publico Correctamente");

        return redirect()->route('vacantes.index');
    }

    public function render()
    {
        $salarios = Salario::all();
        $categorias = Categoria::all();

        return view('livewire.crear-vacante', [
            "salarios" => $salarios,
            "categorias" => $categorias,
        ]);
    }
}
