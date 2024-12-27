<?php

namespace App\Livewire\Solicitud;

use Livewire\Component;
use App\Models\Solicitud;

class Pendientes extends Component
{
    public function cargarSolicitudes()
    {
        $result = null;
        if(auth()->user()->hasRole("RH")){
            $result = Solicitud::where('estado', 'Pendiente')
                ->orderBy('id', 'desc')
                ->get();
        }
        else if(auth()->user()->hasRole("Jefe")){
            $result = Solicitud::where('estado', 'Pendiente') 
            ->whereHas('empleado', function ($query) {
                $query->where('id_jefe', auth()->user()->empleado->id); 
            })
            ->orderBy('id', 'desc') 
            ->get(); 
        }
        return $result;
    }

    public function aprobar($id)
    {
        if(auth()->user()->hasRole("Jefe")){
            $solicitud = Solicitud::find($id);
            $solicitud->aprobacion_jefe = now();
            if(!empty($solicitud->aprobacion_rh)){
                $solicitud->estado = 'Aprobada';
            }
            $solicitud->save();
        }else{
            $solicitud = Solicitud::find($id);
            $solicitud->aprobacion_rh = now();
            if((!empty($solicitud->aprobacion_jefe)) || (empty($solicitud->empleado->id_jefe))){
                // dd($solicitud->empleado->id_jefe);
                $solicitud->estado = 'Aprobada';
            }
            if($solicitud->empleado->id_jefe == auth()->user()->empleado->id){
                $solicitud->estado = 'Aprobada';
            }
            $solicitud->save();
        }    
    }

    public function rechazar($id)
    {
        $solicitud = Solicitud::find($id);
        $solicitud->estado = 'Rechazada';
        $solicitud->save();
    }

    public function render()
    {
        $solicitudes = $this->cargarSolicitudes();
        return view('livewire.solicitud.pendientes', compact('solicitudes'));
    }
}
