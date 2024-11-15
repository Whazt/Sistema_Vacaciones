<?php

namespace App\Livewire;

use App\Models\Empleado;
use Livewire\Component;
use App\Models\Solicitud;
use App\Http\Requests\SolicitudRequest;

class SolicitudCreateModal extends Component
{

    public $id, $id_empleado, $fecha_inicio, $fecha_fin, $estado, $detalles, $aprobacion_jefe, $aprobacion_rh;
    public $open = false;

    public function store()
    {
        $request = new SolicitudRequest();
        // Validar los datos usando las reglas y mensajes de la instancia
        $validatedData = $this->validate(
            $request->rules(),
            $request->messages()
        );
        Solicitud::create($validatedData);
        $this->open = false;
        $this->resetform();
        $this->dispatch('actrender');
    }

    public function cancelar()
    {
        $this->resetform();
        $this->open = false;
        $this->resetValidation();
    }

    public function resetform()
    {
        $this->id = null;
        $this->id_empleado = null;
        $this->fecha_inicio = null;
        $this->fecha_fin = null;
        $this->estado = 'pendiente';
        $this->detalles = '';
        $this->aprobacion_jefe = null;
        $this->aprobacion_rh = null;
    }

    public function render()
    {
       $empleados = Empleado::all();
        return view('livewire.solicitud-create-modal', compact('empleados'));
    }
}
