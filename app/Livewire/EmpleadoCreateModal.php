<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Empleado;
use App\Models\Cargo;
use App\Models\Area;

class EmpleadoCreateModal extends Component
{
    public $id, $nombres, $apellidos, $correo, $telefono, $estado, $fecha_ingreso, $id_cargo, $dias_vacaciones_usados, $id_jefe;
    public $open = false;
    public $cargos_por_area = [], $jefes = [];
    public $area_selected;
    protected $listeners = ['actrender' => 'render'];

    protected $rules = [
        'nombres' => 'required|string|max:255',
        'apellidos' => 'required|string|max:255',
        'correo' => 'required|email|unique:empleados,correo',
        'telefono' => 'required|string|max:15',
       
    ];

    public function load_empleadosarea()
    {
        // Obtener todos los empleados asociados a los cargos del área específica
        $empleados = Empleado::whereHas('cargo', function ($query) {
            $query->where('id_area', $this->area_selected);
        })->get();
        // Guardar los empleados en la propiedad para usarlos en la vista o donde los necesites
        $this->jefes = $empleados;
    }

    public function load_cargos()
    {
        $this->cargos_por_area = Cargo::where('id_area', $this->area_selected)->get();
    }

    public function loadCargosYEmpleados()
    {
        $this->load_cargos();
        $this->load_empleadosarea();
    }
    public function store()
    {
        $this->id_jefe = 1;
        $this->validate();
        $empleado = new Empleado([
            'nombres' => $this->nombres,
            'apellidos' => $this->apellidos,
            'correo' => $this->correo,
            'id_cargo' => $this->id_cargo,
            'fecha_ingreso' => $this->fecha_ingreso,
            'telefono' => $this->telefono,
            'id_jefe' => $this->id_jefe,
            'estado' => $this->estado,
            
        ]);
        $empleado->save();
        $this->open = false;
        $this->resetform();
        $this->dispatch('actrender');

    
    }

    public function resetform()
    {
        $this->id = null;
        $this->nombres = '';
        $this->apellidos = '';
        $this->correo = '';
        $this->telefono = '';
        $this->estado = 'activo';
        $this->fecha_ingreso = null;
        $this->id_cargo = null;
        $this->dias_vacaciones_usados = 0;
        $this->id_jefe = 1;
        $this->area_selected = null;
        $this->cargos_por_area = [];
    }
    public function render()
    {
        $areas = Area::all();
       
        return view('livewire.empleado-create-modal', compact('areas'));
    }
}
