<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Area;
use App\Models\Cargo;

class CargoCreateModal extends Component
{
    public $nombre, $descripcion;
    public $open = false;
    public $selectedArea;

    public function store()
    {
        Cargo::create([
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'id_area' => $this->selectedArea,
        ]);

        $this->open = false;
        $this->dispatch('actrender'); 
    }

    public function render()
    {
        $areas = Area::all();
        return view('livewire.cargo-create-modal', compact('areas'));
    }

}
