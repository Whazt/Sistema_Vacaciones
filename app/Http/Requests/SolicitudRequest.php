<?php

namespace App\Http\Requests;

use App\Models\Empleado;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class SolicitudRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public static function rules($update = false): array
    {
        $rules = [
            'id_empleado' => 'required|integer',
            'fecha_inicio' => 'required|date  ',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
            'estado' => 'string|max:255|nullable',
            'detalles' => 'required|string|max:255',
            'aprobacion_jefe' => 'date|before:fecha_inicio|nullable',
            'aprobacion_rh' => 'date|before:fecha_inicio|nullable',
            
        ];

        if(!$update){
            $rules['fecha_inicio'] .= '|after:today';
        }

        

        return $rules;
    }

    public function messages(): array
    {
        return [
            'id_empleado.required' => 'Debe seleccionar un empleado',
            'id_empleado.integer' => 'Debe seleccionar un empleado',
            'fecha_inicio.required' => 'Debe seleccionar una fecha de inicio',
            'fecha_inicio.date' => 'Debe seleccionar una fecha de inicio',
            'fecha_inicio.after' => 'La fecha de inicio no puede ser mayor a la fecha actual',
            'fecha_fin.required' => 'Debe seleccionar una fecha de fin',
            'fecha_fin.date' => 'Debe seleccionar una fecha de fin',
            'fecha_fin.after_or_equal' => 'La fecha de fin no puede ser menor a la fecha de inicio',
            'estado.string' => 'El campo Estado debe ser de tipo string',
            'estado.max' => 'El campo Estado debe tener un máximo de 255 caracteres',
            'detalles.required' => 'El campo Detalles es obligatorio',
            'detalles.string' => 'El campo Detalles debe ser de tipo string',
            'detalles.max' => 'El campo Detalles debe tener un máximo de 255 caracteres',
            'aprobacion_jefe.date' => 'Debe seleccionar una fecha de aprobación de Jefe',
            'aprobacion_rh.date' => 'Debe seleccionar una fecha de aprobación de RH',
            'aprobacion_jefe.before' => 'La fecha de aprobación de Jefe no puede ser mayor a la fecha de inicio',
            'aprobacion_rh.before' => 'La fecha de aprobación de RH no puede ser mayor a la fecha de inicio',
        ];
    }
    
}

