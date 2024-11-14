<?php

namespace App\Livewire;

use App\Models\Solicitud;
use Livewire\Component;

use function Laravel\Prompts\select;

class VacacionesShow extends Component
{

    public function render()
    {
        $vacaciones = Solicitud::where('estado', 'Aprobado')->get();
        return view('livewire.vacaciones-show', compact('vacaciones') );
    }
}
