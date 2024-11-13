<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Area;

use function Termwind\render;

class AreaShow extends Component
{
    public $id,$descripcion, $nombre;
    public $open_edit=false;
    protected $listeners = ['actrender' => 'render'];

    protected $rules = [
        'nombre' => 'required|string|max:255|unique:areas,nombre',
        'descripcion' => 'required|string|max:255',
    ];

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
        $uniqueRule = $this->id ? 'unique:areas,nombre,' . $this->id : 'unique:areas,nombre';
        $this->validate([ 'nombre' => 'required|string|' . $uniqueRule, 
        'descripcion' => 'required|string', 
        ]);
        Area::where('id', $this->id)->update([
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
        ]);
        $this->open_edit = false;
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
