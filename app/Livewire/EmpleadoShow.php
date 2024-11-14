<?php

namespace App\Livewire;

use App\Models\Area;
use Livewire\Component;
use App\Models\Empleado;
use App\Models\Cargo;
use Carbon\Carbon;

class EmpleadoShow extends Component
{
    public $id, $nombres, $apellidos, $correo, $telefono, $id_cargo, $estado, $fecha_ingreso, $dias_vacaciones_usados, $id_jefe;
    public $open_edit = false;
    public $area_selected;
    public $cargos_por_area = [], $jefes = [];
    protected $listeners = ['actrender' => 'render'];

    protected $rules = [
        'nombres' => 'required|string|max:255',
        'apellidos' => 'required|string|max:255',
        'correo' => 'required|email|unique:empleados,correo',
        'telefono' => 'required|string|max:15',
        'estado' => 'required|string',
    ];

    // metodos para editar y guardar
    public function edit($idempleado)
    {
        $empleado = Empleado::findOrFail($idempleado);
        $this->id = $empleado->id;
        $this->nombres = $empleado->nombres;
        $this->apellidos = $empleado->apellidos;
        $this->correo = $empleado->correo;
        $this->telefono = $empleado->telefono;
        $this->id_cargo = $empleado->id_cargo;
        $this->estado = $empleado->estado;
        $this->id_jefe = $empleado->id_jefe;
        $this->fecha_ingreso = $empleado->fecha_ingreso;
        $this->dias_vacaciones_usados = $empleado->dias_vacaciones_usados;
        $this->area_selected = $empleado->cargo->area->id;
        $this->open_edit = true;
    }

    public function update()
    {
        $uniqueRule = $this->id ? 'unique:empleados,correo,' . $this->id: 'unique:empleados,correo';
        $this->validate([
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'correo' => 'required|email|' . $uniqueRule,
            'telefono' => 'required|string|max:15',
            'estado' => 'required|string',
        ]);

        Empleado::where('id', $this->id)->update([
            'nombres' => $this->nombres,
            'apellidos' => $this->apellidos,
            'correo' => $this->correo,
            'telefono' => $this->telefono,
            'estado' => $this->estado,
            'id_jefe' => $this->id_jefe,
            'id_cargo' => $this->id_cargo,
            'dias_vacaciones_usados' => $this->dias_vacaciones_usados,
            'fecha_ingreso' => $this->fecha_ingreso,

        ]);

        $this->resetForm();
        $this->open_edit = false;
    }

    // metodos para borrar

    public function delete(Empleado $empleado)
    {
        $empleado->delete();
        $this->resetForm();
    }

    // metodos para CALCULAR DIAS DISPONIBLES
    public function calcularDiasVacacionesDisponibles($fechaIngreso, $diasUsados)
    {
        $fechaIngreso = Carbon::parse($fechaIngreso); // Convertir a Carbon si no lo está
        $fechaActual = now();

        $diasTrabajados = $fechaIngreso->diffInDays($fechaActual);
        $tasaDiariaVacaciones = 15 / 182.5; // Asumiendo 15 días de vacaciones cada 6 meses (182.5 días)
        $vacacionesAcumuladas = $diasTrabajados * $tasaDiariaVacaciones;
        $vacacionesAcumuladas = round($vacacionesAcumuladas, 2);

        $diasDisponibles = $vacacionesAcumuladas - $diasUsados;

        return max(0, $diasDisponibles); // Asegura que no haya valores negativos
    }


    // metodos para cargar datos
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

    public function render()
    {
        $empleados = Empleado::all()->map(function($empleado) {
            $empleado->dias_disponibles = $this->calcularDiasVacacionesDisponibles($empleado->fecha_ingreso, $empleado->dias_vacaciones_usados);
            return $empleado;
        }); 

        $areas = Area::all();

        return view('livewire.empleado-show', compact('empleados'), compact('areas'));
    }
}
