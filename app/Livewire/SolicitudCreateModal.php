<?php

namespace App\Livewire;

use App\Models\Empleado;
use Livewire\Component;
use App\Models\Solicitud;

class SolicitudCreateModal extends Component
{

    public $id, $id_empleado, $fecha_inicio, $fecha_fin, $estado, $detalles, $aprobacion_jefe, $aprobacion_rh;
    public $open = false;

    public $rules = [
        'id_empleado' => 'required|integer',
        'fecha_inicio' => 'required|date',
        'fecha_fin' => 'required|date',
        'detalles' => 'required|string|max:255',
        
    ];
    public function store()
    {
        $this->validate();
        Solicitud::create([
            'id_empleado' => $this->id_empleado,
            'fecha_inicio' => $this->fecha_inicio,
            'fecha_fin' => $this->fecha_fin,
            'estado' => $this->estado,
            'detalles' => $this->detalles,
            'aprobacion_jefe' => $this->aprobacion_jefe,
            'aprobacion_rh' => $this->aprobacion_rh,
        ]);
        $this->open = false;
        $this->resetform();
        $this->dispatch('actrender');
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
