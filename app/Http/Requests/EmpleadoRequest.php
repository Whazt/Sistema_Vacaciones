<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpleadoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public static function rules(): array
    {
        $idEmpleado = request()->input('id');
        return [
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'correo' => 'required|string|email|max:255|unique:empleados,correo,'.$idEmpleado,
            'id_cargo' => 'required|integer',
            'fecha_ingreso' => 'required|date|before:today',
            'dias_vacaciones_usados' => 'integer|nullable',
            'telefono' => 'required|string|max:8',
            'id_jefe' => 'integer|nullable',
            'estado' => 'string|max:255|nullable',
        ];
    }

    public function messages(): array
    {
        
        return [
            'nombres.required' => 'El campo Nombre es obligatorio',
            'nombres.string' => 'El campo Nombre debe ser de tipo string',
            'nombres.max' => 'El campo Nombre debe tener un máximo de 255 caracteres',
            'apellidos.required' => 'El campo Apellidos es obligatorio',
            'apellidos.string' => 'El campo Apellidos debe ser de tipo string',
            'apellidos.max' => 'El campo Apellidos debe tener un máximo de 255 caracteres',
            'correo.required' => 'El campo Correo es obligatorio',
            'correo.string' => 'El campo Correo debe ser de tipo string',
            'correo.email' => 'El campo Correo debe ser un correo electrónico válido',
            'correo.max' => 'El campo Correo debe tener un máximo de 255 caracteres',
            'correo.unique' => 'El correo electrónico ya existe',
            'id_cargo.required' => 'Debe Seleccionar un cargo',
            'id_cargo.integer' => 'Debe Seleccionar un cargo',
            'fecha_ingreso.required' => 'Debe seleccionar una fecha de ingreso',
            'fecha_ingreso.date' => 'Debe seleccionar una fecha de ingreso',
            'fecha_ingreso.before' => 'La fecha de ingreso no puede ser mayor a la fecha actual',
            'dias_vacaciones_usados.integer' => 'Debe seleccionar un número de días de vacaciones usados',
            'telefono.required' => 'El campo Telefono es obligatorio',
            'telefono.string' => 'El campo Telefono debe ser de tipo string',
            'telefono.max' => 'El campo Telefono debe tener un máximo de 8 caracteres',
            'id_jefe.integer' => 'Debe seleccionar un jefe',
            'estado.string' => 'El campo Estado debe ser de tipo string',
            'estado.max' => 'El campo Estado debe tener un máximo de 255 caracteres',
        ];
    }
}
