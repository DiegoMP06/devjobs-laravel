<?php

namespace App\Livewire;

use App\Models\Vacante;
use Livewire\Component;
use App\Models\Candidato;
use App\Notifications\NuevoCandidato;
use Livewire\WithFileUploads;

class PostularVacante extends Component
{
    public $cv;
    public $vacante;

    use WithFileUploads;

    protected $rules = [
        'cv' => 'required|mimes:pdf|max:1024',
    ];

    public function mount(Vacante $vacante)
    {
        $this->vacante = $vacante;
    }

    public function crearCandidato()
    {
        $this->authorize('create', Candidato::class);

        $datos = $this->validate();

        $cv = $this->cv->store('/cvs');

        $this->vacante->candidatos()->create([
            'cv' => $cv,
            'user_id' => auth()->user()->id,
        ]);

        $this->vacante->reclutador->notify(new NuevoCandidato(
            $this->vacante->id,
            $this->vacante->titulo,
            auth()->user()->id
        ));

        session()->flash('mensaje', 'Se Envio Correctamente tu Informacion, Mucha Suerte!');

        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
