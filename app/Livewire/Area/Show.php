<?php

namespace App\Livewire\Area;

use Livewire\Component;
use App\Models\Area;
use App\Http\Requests\AreaRequest;
use Livewire\WithPagination;

use function Termwind\render;

class Show extends Component
{
    use WithPagination;
    public $id,$descripcion, $nombre, $search;
    public $open_edit=false;
    protected $listeners = [
        'actrender' => 'render',
        'delete' => 'delete'
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

    public function updatingSearch(){
        $this->resetPage();
    }

    public function delete($id){
        Area::find($id)->delete();
    }

    public function render()
    {
        $areas = Area::where('nombre', 'LIKE', '%'.$this->search.'%') 
                 ->paginate(5); 

        return view('livewire.area.show', compact('areas'));
    }

   
}
