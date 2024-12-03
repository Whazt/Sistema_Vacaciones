<?php

namespace App\Livewire\Solicitud;

use App\Models\Solicitud;

use App\Http\Requests\SolicitudRequest;
use Livewire\Component;
use Livewire\WithPagination;

class ShowMisSolicitudes extends Component
{
    use WithPagination;
    public $id, $id_empleado, $fecha_inicio, $fecha_fin, $estado, $detalles, $aprobacion_jefe, $aprobacion_rh, $search;
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
        $this->aprobacion_jefe = $solicitud->aprobacion_jefe;
        $this->aprobacion_rh = $solicitud->aprobacion_rh;
        $this->open_edit = true;
    }

    public function update(){
        $request = new SolicitudRequest();
       
        // Validar los datos usando las reglas y mensajes de la instancia
        
        $validatedData = $this->validate(
            $request->rules(true),
            $request->messages()
        );  
        Solicitud::where('id', $this->id)->update($validatedData);
        $this->open_edit = false;
    }

    public function cancelar()
    {
        $this->open_edit = false;
        $this->resetValidation();
    }
    public function delete(Solicitud $solicitud){
        $solicitud->delete();
    }

    public function loadByUser(){
        $user = auth()->user();

        return Solicitud::whereHas('empleado', function ($query) use ($user){
            $query->where('correo', $user->email)
                ->where('nombres', 'LIKE', '%'.$this->search.'%')
                ->orWhere('apellidos', 'LIKE', '%'.$this->search.'%');
        })
        
        ->paginate(5);        
    }

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $solicitudes = $this->loadByUser();
        return view('livewire.solicitud.show-mis-solicitudes', compact('solicitudes'));
    }
}
