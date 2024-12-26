<?php

namespace App\Livewire;

use App\Models\Solicitud;
use Livewire\Component;

use function Laravel\Prompts\select;
 
class VacacionesShow extends Component
{

    public function cargarSolicitudes(){
        $user = auth()->user();

        $vacaciones = Solicitud::where('estado', 'Aprobada')
        ->whereHas('empleado', function($query) use ($user) {
            $query->where('correo', $user->email);
        })->get();

        return $vacaciones;
    }
    public function render()
    {
        $vacaciones = $this->cargarSolicitudes();
        return view('livewire.vacaciones-show', compact('vacaciones') );
    }
}
