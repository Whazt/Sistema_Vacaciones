<?php

namespace App\Livewire\Cargo;

use Livewire\Component;
use App\Models\Area;
use App\Models\Cargo;
use App\Http\Requests\CargoRequest;

class CreateModal extends Component
{
    public $nombre, $descripcion;
    public $open = false;
    public $id_area;

    public function store()
    {
        $request = new CargoRequest();
        // Validar los datos usando las reglas y mensajes de la instancia
        $validatedData = $this->validate(
            $request->rules(),
            $request->messages()
        );
        Cargo::create($validatedData);

        $this->open = false;
        $this->dispatch('actrender'); 
    }

    public function cancelar()
    {
        $this->reset(['nombre', 'descripcion']);
        $this->open = false;
        $this->resetValidation();
    }
    public function render()
    {
        $areas = Area::all();
        return view('livewire.cargo.create-modal', compact('areas'));
    }

}
