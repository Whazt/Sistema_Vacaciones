<?php

namespace App\Livewire;

use App\Models\Area;
use Livewire\Component;

class AreaCreateModal extends Component
{
    public $open = false;
    public $nombre, $descripcion;

    public function store()
    {
        Area::create([
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
        ]);

        $this->open = false;
        $this->dispatch('actrender'); // Cambiado a minúsculas
    }

    public function render()
    {
        return view('livewire.area-create-modal');
    }
}
