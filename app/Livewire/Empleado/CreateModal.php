<?php

namespace App\Livewire\Empleado;

use Livewire\Component;
use App\Models\Empleado;
use App\Models\Cargo;
use App\Models\Area;
use App\Http\Requests\EmpleadoRequest;

class CreateModal extends Component
{
    public $id, $nombres, $apellidos, $correo, $telefono, $estado, $fecha_ingreso, $id_cargo, $dias_vacaciones_usados, $id_jefe;
    public $open = false;
    public $cargos_por_area = [], $jefes = [];
    public $area_selected, $searchEmp;
    protected $listeners = ['actrender' => 'render'];

    public function load_empleados()
    {
        $empleados = Empleado::where('nombres', 'like', '%'.$this->searchEmp.'%')
            ->orWhere('apellidos', 'like', '%'.$this->searchEmp.'%')
            ->get();
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
        $request = new EmpleadoRequest();
        // Validar los datos usando las reglas y mensajes de la instancia
        $validatedData = $this->validate(
            $request->rules(),
            $request->messages()
        );
        // Crear el área con los datos validados
        Empleado::create($validatedData);
        
        $this->open = false;
        $this->resetform();
        $this->resetValidation();
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
        $this->id_jefe = null;
        $this->area_selected = null;
        $this->cargos_por_area = [];
    }

    public function cancelar()
    {
        $this->resetform();
        $this->open = false;
        $this->resetValidation();
    }

    public function render()
    {
        $areas = Area::all();
        $jefes = $this->load_empleados();
       
        return view('livewire.empleado.create-modal', compact('areas'), compact('jefes'));
    }
}
