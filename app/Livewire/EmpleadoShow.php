<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Empleado;

class EmpleadoShow extends Component
{
    public $cargo;
    protected $listeners = ['actrender' => 'render'];

    public function render()
    {
        $cargos = Empleado::with('area')->get();
        return view('livewire.empleado-show', compact('cargos'));
    }


    public function delete(Empleado $cargo){
        $cargo->delete();
    }
}
