<?php

namespace App\Livewire;

use App\Models\Vacante;
use Livewire\Component;
use Livewire\Attributes\On; 

class MostrarVacantes extends Component
{
    #[on('eliminarVacante')]

    public function eliminarVacante(Vacante $vacante)
    {
        $this->authorize('delete', $vacante);

        $vacante->delete();
        
        if(is_dir(storage_path('app/public/' . $vacante->imagen))) {
            unlink(storage_path('app/public/' . $vacante->imagen));
        }
    }

    public function render()
    {
        $vacantes = Vacante::where('user_id', auth()->user()->id)->latest()->paginate(10);

        return view('livewire.mostrar-vacantes', [
            'vacantes' => $vacantes
        ]);
    }
}