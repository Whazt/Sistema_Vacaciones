<?php

namespace App\Livewire;

use App\Models\Solicitud;
use Livewire\Component;

class SolicitudShow extends Component
{
    public $id, $id_empleado, $fecha_inicio, $fecha_fin, $estado, $detalles, $aprobacion_jefe, $aprovacion_rh;
    public $open_edit=false;

    public function render()
    {
        $solicitudes = Solicitud::all();
        return view('livewire.solicitud-show', compact('solicitudes'));
    }
}
