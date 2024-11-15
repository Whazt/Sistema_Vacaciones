<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Area;
use App\Http\Requests\AreaRequest;

use function Termwind\render;

class AreaShow extends Component
{
    public $id,$descripcion, $nombre;
    public $open_edit=false;
    protected $listeners = ['actrender' => 'render'];


    public function edit($idarea)
    {
        
       $area = Area::find($idarea);
       $this->id = $area->id;
       $this->descripcion = $area->descripcion;
       $this->nombre = $area->nombre;
       $this->open_edit = true;
    }

    public function update()
    {
        $request = new AreaRequest();
        // Validar los datos usando las reglas y mensajes de la instancia
        $validatedData = $this->validate(
            $request->rules(),
            $request->messages()
        );
        // Crear el área con los datos validados
       
        Area::where('id', $this->id)->update($validatedData);
        $this->open_edit = false;
    }

    public function cancelar()
    {
        $this->open_edit = false;
        $this->resetValidation();
    }

    public function render()
    {
        $areas = Area::all();
        return view('livewire.area-show', compact('areas'));
    }

    public function delete(Area $area){
        $area->delete();
    }
}
