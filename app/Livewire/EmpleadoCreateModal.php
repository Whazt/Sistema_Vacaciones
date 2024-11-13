<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Empleado;
use App\Models\Cargo;
use App\Models\Area;

class EmpleadoCreateModal extends Component
{
    public $id, $nombres, $apellidos, $correo, $telefono, $estado, $fecha_ingreso, $id_cargo, $dias_vacaciones_usados;
    public $open = false;
    public $cargos_por_area = [];
    public $area_selected;
    protected $listeners = ['actrender' => 'render'];

    protected $rules = [
        'nombres' => 'required|string|max:255',
        'apellidos' => 'required|string|max:255',
        'correo' => 'required|email|unique:empleados,correo',
        'telefono' => 'required|string|max:15',
        'estado' => 'required|string',
    ];

    public function load_cargos()
    {
        $this->cargos_por_area = Cargo::where('id_area', $this->area_selected)->get();
    }

    public function store()
    {
        $this->validate();
        $empleado = new Empleado([
            'nombres' => $this->nombres,
            'apellidos' => $this->apellidos,
            'correo' => $this->correo,
            'telefono' => $this->telefono,
            'estado' => $this->estado,
            'id_cargo' => $this->id_cargo,
            'fecha_ingreso' => $this->fecha_ingreso,
            'dias_vacaciones_usados' => $this->dias_vacaciones_usados,
        ]);
        $empleado->save();
    }
    public function render()
    {
        $areas = Area::all();
        return view('livewire.empleado-create-modal', compact('areas'));
    }
}
