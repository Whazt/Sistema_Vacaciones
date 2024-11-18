<?php

namespace App\Livewire\Area;

use Livewire\Component;
use App\Models\Area;
use App\Http\Requests\AreaRequest;

class CreateModal extends Component
{
    public $open = false;
    public $nombre, $descripcion;

    public function store()
    {
        $request = new AreaRequest();
        // Validar los datos usando las reglas y mensajes de la instancia
        $validatedData = $this->validate(
            $request->rules(),
            $request->messages()
        );
        // Crear el área con los datos validados
        Area::create($validatedData);
       
        $this->reset(['nombre', 'descripcion']);
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
        return view('livewire.area.create-modal');
    }
}
