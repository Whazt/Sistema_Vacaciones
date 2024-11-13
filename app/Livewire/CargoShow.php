<?php

namespace App\Livewire;

use App\Models\Cargo;
use Livewire\Component;
use App\Models\Area;

class CargoShow extends Component
{
    public $id,$nombre,$descripcion,$id_area;
    public $open_edit=false;
    public $areas;
    protected $listeners = ['actrender' => 'render'];

    public function render()
    {
        $cargos = Cargo::with('area')->get();
        return view('livewire.cargo-show', compact('cargos'));
    }

    public function mount(){
        $this->areas = Area::all();
    }

    public function edit($idcargo)
    {
        $cargo = Cargo::find($idcargo);
        $this->id = $cargo->id;
        $this->nombre = $cargo->nombre;
        $this->descripcion = $cargo->descripcion;   
        $this->id_area = $cargo->id_area;
        $this->open_edit = true;
    }

    public function update()
    {
        $uniqueRule = $this->id ? 'unique:areas,nombre,' . $this->id : 'unique:areas,nombre';
        $this->validate([ 'nombre' => 'required|string|'.$uniqueRule,
        'descripcion' => 'required|string', 
        ]);
        Cargo::where('id', $this->id)->update([
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'id_area' => $this->id_area,
        ]);
        $this->open_edit = false;
    }

    public function delete(Cargo $cargo){
        $cargo->delete();
    }
   
}
