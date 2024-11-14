<?php

namespace App\Livewire;

use App\Models\Solicitud;
use App\Models\Empleado;
use Livewire\Component;

class SolicitudShow extends Component
{
    public $id, $id_empleado, $fecha_inicio, $fecha_fin, $estado, $detalles, $aprobacion_jefe, $aprovacion_rh;
    public $open_edit=false;


    protected $listeners = ['actrender' => 'render'];

    public function edit($idempleado){
        $solicitud = Solicitud::find($idempleado);
        $this->id = $solicitud->id;
        $this->id_empleado = $solicitud->id_empleado;
        $this->fecha_inicio = $solicitud->fecha_inicio;
        $this->fecha_fin = $solicitud->fecha_fin;
        $this->estado = $solicitud->estado;
        $this->detalles = $solicitud->detalles;
        $this->open_edit = true;
    }

    public function update(){
        $uniqueRule = $this->id ? 'unique:solicitudes,id_empleado' : 'unique:solicitudes,id_empleado';
        $this->validate([
            'id_empleado' => 'required|integer|',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
            'detalles' => 'required|string|max:255',
            'estado' => 'required|string',
        ]);
        Solicitud::where('id', $this->id)->update([
            'id_empleado' => $this->id_empleado,
            'fecha_inicio' => $this->fecha_inicio,
            'fecha_fin' => $this->fecha_fin,
            'estado' => $this->estado,
            'detalles' => $this->detalles,
        ]);
        $this->open_edit = false;
    }

    public function delete(Solicitud $solicitud){
        $solicitud->delete();
    }
    
    public function render()
    {
        $solicitudes = Solicitud::all();
        $empleados = Empleado::all();
        return view('livewire.solicitud-show', compact('solicitudes'), compact('empleados'));
    }
}
