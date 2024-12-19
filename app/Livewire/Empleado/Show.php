<?php

namespace App\Livewire\Empleado;

use App\Models\Area;
use Livewire\Component;
use App\Models\Empleado;
use App\Models\Cargo;
use App\Http\Requests\EmpleadoRequest;
use Carbon\Carbon;
use Livewire\WithPagination;

class Show extends Component
{
    use WithPagination;
    public $id, $nombres, $apellidos, $correo, $telefono, $id_cargo, $estado, $fecha_ingreso, $dias_vacaciones_usados, $id_jefe;
    public $open_edit = false;
    public $area_selected, $search , $searchEmp, $searchCargo;
    public $cargos = [], $jefes = [];
    protected $listeners = ['actrender' => 'render'];

    // metodos para editar y guardar
    public function edit($idempleado)
    {
        $empleado = Empleado::findOrFail($idempleado);
        if($empleado->id_jefe != null){

            $jefe = Empleado::findOrFail($empleado->id_jefe);
            $this->searchEmp = $jefe->nombres . " " . $jefe->apellidos;
        }
        else
        {
            $this->searchEmp = '';
        }
        if($empleado->id_cargo != null){

            $cargo = Cargo::findOrFail($empleado->id_cargo);
            $this->searchCargo = $cargo->nombre;
            $this->area_selected = $empleado->cargo->area->id;
        }
        else
        {
            $this->area_selected = '';
            $this->searchCargo = '';
        }

        $this->id = $empleado->id;
        $this->nombres = $empleado->nombres;
        $this->apellidos = $empleado->apellidos;
        $this->correo = $empleado->correo;
        $this->telefono = $empleado->telefono;
        $this->estado = $empleado->estado;
        $this->id_jefe = $empleado->id_jefe;
        $this->fecha_ingreso = $empleado->fecha_ingreso;
        $this->id_cargo = $empleado->id_cargo;
        $this->dias_vacaciones_usados = $empleado->dias_vacaciones_usados;
        $this->open_edit = true;
       
    }

    public function update()
    {
        $request = new EmpleadoRequest();
        // Agregar el ID a la solicitud
        request()->merge(['id' => $this->id]);
        // Validar los datos usando las reglas y mensajes de la instancia
        
        $validatedData = $this->validate(
            $request->rules(),
            $request->messages()
        );
        Empleado::where('id', $this->id)->update($validatedData);

        $this->open_edit = false;
    }
    // metodos para borrar
    public function delete(Empleado $empleado)
    {
        $empleado->delete();
    }
    // metodos para CALCULAR DIAS DISPONIBLES
    public function calcularDiasVacacionesDisponibles($fechaIngreso, $diasUsados)
    {
        $fechaIngreso = Carbon::parse($fechaIngreso); // Convertir a Carbon si no lo está
        $fechaActual = now();

        $diasTrabajados = floor($fechaIngreso->diffInDays($fechaActual));
        $tasaDiariaVacaciones = 30 / 365; // Asumiendo 15 días de vacaciones cada 6 meses (182.5 días)
        $vacacionesAcumuladas = $diasTrabajados * $tasaDiariaVacaciones;
        $vacacionesAcumuladas = round($vacacionesAcumuladas, 2);

        $diasDisponibles = $vacacionesAcumuladas - $diasUsados;

        return max(0, $diasDisponibles); // Asegura que no haya valores negativos
    }

    public function load_empleadosSearch()
    {
        
        $empleados = Empleado::where('id', '!=', $this->id)
        ->where(function ($query) {
            $query->where('nombres', 'LIKE', '%'.$this->searchEmp.'%')
                  ->orWhere('apellidos', 'LIKE', '%'.$this->searchEmp.'%');
        })->get();
        $this->jefes = $empleados;
    }

    public function load_cargosSearch()
    {
        $cargos = Cargo::where('id_area', $this->area_selected)
        ->where(function ($query) {
            $query->where('nombre', 'LIKE', '%'.$this->searchCargo.'%');
        })->get();

        $this->cargos= $cargos;    
    }

    // public function load_cargos()
    // {
    //     $this->cargos_por_area = Cargo::where('id_area', $this->area_selected)->get();
    // }

    public function loadCargosYEmpleados()
    {
        $this->load_cargosSearch();
        $this->load_empleadosSearch();
        
    }

    public function cancelar()
    {
        $this->open_edit = false;
        $this->resetValidation();
        $this->searchEmp = '';
        $this->resetForm();
    }

    public function resetForm(){
        $this->id = null;
        $this->nombres =null;
        $this->apellidos = null;
        $this->correo = null;
        $this->telefono =null;
        $this->id_cargo = null;
        $this->estado =null;
        $this->id_jefe = null;
        $this->fecha_ingreso = null;
        $this->dias_vacaciones_usados = null;
        $this->area_selected = null;
        $this->jefes = [];
        $this->cargos = [];
        $this->search = null;
        $this->searchEmp = null;
        $this->searchCargo = null;
    
    }

    public function cargarEmpleados(){
        $user = auth()->user();
        
        if ($user->hasRole('Jefe')) {
            $empl = Empleado::where('correo', $user->email)->first();
            $query = Empleado::where('id_jefe', $empl->id)
                ->where(function ($q) {
                    $q->where('nombres', 'LIKE', '%'.$this->search.'%')
                      ->orWhere('apellidos', 'LIKE', '%'.$this->search.'%');
                });
        } else {
            $query = Empleado::where(function ($q) {
                $q->where('nombres', 'LIKE', '%'.$this->search.'%')
                  ->orWhere('apellidos', 'LIKE', '%'.$this->search.'%');
            });
        }
    
        // Paginación con transformación
        $empleados = $query->paginate(5); // Número de registros por página
    
        // Transformar los datos
        $empleados->getCollection()->transform(function ($empleado) {
            $empleado->dias_disponibles = $this->calcularDiasVacacionesDisponibles(
                $empleado->fecha_ingreso,
                $empleado->dias_vacaciones_usados
            );
            return $empleado;
        });
    
        // Devuelve directamente el objeto paginado, compatible con foreach
        return $empleados;
    }

    public function render()
    {
        $empleados = $this->cargarEmpleados();
        $areas = Area::all();
        $cargos = $this->load_cargosSearch();
        $jefes = $this->load_empleadosSearch();

        return view('livewire.empleado.show', compact('empleados', 'areas', 'cargos'));
    }
}
