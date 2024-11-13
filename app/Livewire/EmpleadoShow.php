<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Empleado;
use Carbon\Carbon;

class EmpleadoShow extends Component
{
    public $empleado_id, $nombres, $apellidos, $correo, $telefono, $estado, $fecha_ingreso, $dias_vacaciones_usados;
    public $open_edit = false;
    protected $listeners = ['actrender' => 'render'];

    protected $rules = [
        'nombres' => 'required|string|max:255',
        'apellidos' => 'required|string|max:255',
        'correo' => 'required|email|unique:empleados,correo',
        'telefono' => 'required|string|max:15',
        'estado' => 'required|string',
    ];

    public function edit($idempleado)
    {
        $empleado = Empleado::findOrFail($idempleado);
        $this->empleado_id = $empleado->id;
        $this->nombres = $empleado->nombres;
        $this->apellidos = $empleado->apellidos;
        $this->correo = $empleado->correo;
        $this->telefono = $empleado->telefono;
        $this->estado = $empleado->estado;
        $this->fecha_ingreso = $empleado->fecha_ingreso;
        $this->dias_vacaciones_usados = $empleado->dias_vacaciones_usados;
        $this->open_edit = true;
    }

    public function update()
    {
        $uniqueRule = $this->empleado_id ? 'unique:empleados,correo,' . $this->empleado_id : 'unique:empleados,correo';
        $this->validate([
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'correo' => 'required|email|' . $uniqueRule,
            'telefono' => 'required|string|max:15',
            'estado' => 'required|string',
        ]);

        Empleado::where('id', $this->empleado_id)->update([
            'nombres' => $this->nombres,
            'apellidos' => $this->apellidos,
            'correo' => $this->correo,
            'telefono' => $this->telefono,
            'estado' => $this->estado,
        ]);

        $this->resetForm();
        $this->open_edit = false;
    }

    public function delete(Empleado $empleado)
    {
        $empleado->delete();
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->empleado_id = null;
        $this->nombres = '';
        $this->apellidos = '';
        $this->correo = '';
        $this->telefono = '';
        $this->estado = 'activo';
        $this->fecha_ingreso = null;
        $this->dias_vacaciones_usados = 0;
    }

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

    public function render()
    {
        $empleados = Empleado::all()->map(function($empleado) {
            $empleado->dias_disponibles = $this->calcularDiasVacacionesDisponibles($empleado->fecha_ingreso, $empleado->dias_vacaciones_usados);
            return $empleado;
        });

        return view('livewire.empleado-show', compact('empleados'));
    }
}
