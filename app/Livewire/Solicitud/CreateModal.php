<?php

namespace App\Livewire\Solicitud;

use App\Models\Empleado;
use Livewire\Component;
use App\Models\Solicitud;
use App\Http\Requests\SolicitudRequest;
use Carbon\Carbon;

class CreateModal extends Component
{

    public $id, $id_empleado, $fecha_inicio, $fecha_fin, $estado = "Pendiente", $detalles, $aprobacion_jefe, $aprobacion_rh;
    public $open = false;
    public $dias_disponibles;

    public function store()
    {
        if( auth()->user()->hasRole("Empleado") || auth()->user()->hasRole("Jefe")){
            $this->id_empleado = auth()->user()->empleado->id;

        }
        $request = new SolicitudRequest();
        // Validar los datos usando las reglas y mensajes de la instancia
        $validatedData = $this->validate(
            $request->rules(),
            $request->messages()
        );

        // Calcular los días solicitados
        $fechaInicio = Carbon::parse($this->fecha_inicio);
        $fechaFin = Carbon::parse($this->fecha_fin);

        $diasSolicitados = $fechaInicio->diffInDays($fechaFin) + 1; // +1 porque ambos días cuentan

        if ($diasSolicitados > $this->dias_disponibles) {
            $this->addError('fecha_fin', 'Los días solicitados exceden los días disponibles.');
            return;
        }

        Solicitud::create($validatedData);
        $this->open = false;
        $this->resetform();
        $this->dispatch('actrender');
    }

    public function mount(){
        // Si el rol es "Empleado" o "Jefe", asignar directamente el empleado asociado al usuario
        if (auth()->user()->hasRole('Empleado') || auth()->user()->hasRole('Jefe')) {
            $empleado = auth()->user()->empleado;
            if(!empty($empleado)){
                $this->id_empleado = $empleado->id;
                $this->dias_disponibles = $this->calcularDiasVacacionesDisponibles(
                    $empleado->fecha_ingreso,
                    $empleado->dias_vacaciones_usados
                );
            }
        }
    }

    public function updatedIdEmpleado($value)
    {
        // Actualizar los días disponibles al cambiar el empleado
        $empleado = Empleado::find($value);
        if ($empleado) {
            $this->dias_disponibles = $this->calcularDiasVacacionesDisponibles(
                $empleado->fecha_ingreso,
                $empleado->dias_vacaciones_usados
            );
        } else {
            $this->dias_disponibles = 0;
        }
    }

    public function cancelar()
    {
        $this->resetform();
        $this->open = false;
        $this->resetValidation();
    }

    public function resetform()
    {
        $this->id = null;
        $this->id_empleado = null;
        $this->fecha_inicio = null;
        $this->fecha_fin = null;
        $this->estado = 'pendiente';
        $this->detalles = '';
        $this->aprobacion_jefe = null;
        $this->aprobacion_rh = null;
    }

    public function calcularDiasVacacionesDisponibles($fechaIngreso, $diasUsados)
    {
        $fechaIngreso = Carbon::parse($fechaIngreso); // Convertir a Carbon si no lo está
        $fechaActual = now();

        $diasTrabajados = floor($fechaIngreso->diffInDays($fechaActual));
        $tasaDiariaVacaciones = 30 / 365; // Asumiendo 15 días de vacaciones cada 6 meses (182.5 días)
        $vacacionesAcumuladas = $diasTrabajados * $tasaDiariaVacaciones;
        $vacacionesAcumuladas = floor($vacacionesAcumuladas);

        $diasDisponibles = $vacacionesAcumuladas - $diasUsados;

        return max(0, $diasDisponibles); // Asegura que no haya valores negativos
    }

    public function render()
    {
       $empleados = Empleado::all();
       
        return view('livewire.solicitud.create-modal', compact('empleados'));
    }
}
