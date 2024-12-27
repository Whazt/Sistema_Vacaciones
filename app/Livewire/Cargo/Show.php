<?php

namespace App\Livewire\Cargo;

use App\Models\Cargo;
use Livewire\Component;
use App\Models\Area;
use App\Http\Requests\CargoRequest;
use Livewire\WithPagination;

class Show extends Component
{
    use WithPagination;
    public $id,$nombre,$descripcion,$id_area, $search;
    public $open_edit=false;
    public $areas;
    protected $listeners = [
        'actrender' => 'render',
        'delete' => 'delete'
    ];

    
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
        $request = new CargoRequest();
        // Validar los datos usando las reglas y mensajes de la instancia
        $validatedData = $this->validate(
            $request->rules(),
            $request->messages()
        );
        // Crear el área con los datos validados
        Cargo::where('id', $this->id)->update($validatedData);
        $this->open_edit = false;
    }

    public function cancelar()
    {
        $this->open_edit = false;
        $this->resetValidation();
    }

    public function delete($id){
        Cargo::find($id)->delete();
    }
    
    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $cargos = Cargo::with('area')
            ->where('nombre', 'LIKE', '%'.$this->search.'%')
            ->orderBy('id_area', 'asc')
            ->paginate(5);

        return view('livewire.cargo.show', compact('cargos'));
    } 

}
