<?php

namespace App\Livewire;

use App\Models\Cargo;
use Livewire\Component;

class CargoShow extends Component
{
    public $cargo;
    protected $listeners = ['actrender' => 'render'];

    public function render()
    {
        $cargos = Cargo::with('area')->get();
        return view('livewire.cargo-show', compact('cargos'));
    }


    public function delete(Cargo $cargo){
        $cargo->delete();
    }
   
}
