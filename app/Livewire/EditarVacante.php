<?php

namespace App\Livewire;

use App\Models\Salario;
use App\Models\Vacante;
use Livewire\Component;
use App\Models\Categoria;
use Livewire\WithFileUploads;

class EditarVacante extends Component
{
    public $imagen_previa;

    public $vacante_id;
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
        "salario" => 'required|numeric',
        'categoria' => "required|numeric",
        'imagen' => 'nullable|image|max:1024',
    ];

    public function mount(Vacante $vacante)
    {
        $this->vacante_id = $vacante->id;
        $this->titulo = $vacante->titulo;
        $this->empresa = $vacante->empresa;
        $this->ultimo_dia = $vacante->ultimo_dia;
        $this->descripcion = $vacante->descripcion;
        $this->imagen_previa = $vacante->imagen;
        $this->salario = $vacante->salario_id;
        $this->categoria = $vacante->categoria_id;
    }

    public function editarVacante()
    {
        $datos = $this->validate();

        if ($this->imagen) {
            if(is_dir(storage_path('app/public/vacantes/' . $this->imagen_previa))) {
                unlink(storage_path('app/public/vacantes/' . $this->imagen_previa));
            }

            $imagen = $this->imagen->store('public/vacantes');
            $datos['imagen'] = str_replace('public/vacantes/', '', $imagen);
        } else {
            $datos['imagen'] = $this->imagen_previa;
        }

        $vacante = auth()->user()->vacantes()->find($this->vacante_id);
        $vacante->titulo = $datos['titulo'];
        $vacante->empresa = $datos['empresa'];
        $vacante->ultimo_dia = $datos['ultimo_dia'];
        $vacante->descripcion = $datos['descripcion'];
        $vacante->imagen = $datos['imagen'];
        $vacante->salario_id = $datos['salario'];
        $vacante->categoria_id = $datos['categoria'];
        $vacante->save();

        session()->flash('mensaje', 'La Vacante Se Actualizo Correctamente');
        return redirect()->route('vacantes.index');
    }


    public function render()
    {
        $salarios = Salario::all();
        $categorias = Categoria::all();

        return view('livewire.editar-vacante', [
            'salarios' => $salarios,
            'categorias' => $categorias,
        ]);
    }
}
