<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AreaRequest extends FormRequest
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
        return [
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required' => 'El campo Nombre es obligatorio',
            'nombre.string' => 'El campo Nombre debe ser de tipo string',
            'nombre.max' => 'El campo Nombre debe tener un máximo de 255 caracteres',
            'descripcion.required' => 'El campo Descripción es obligatorio',
            'descripcion.string' => 'El campo Descripción debe ser de tipo string',
            'descripcion.max' => 'El campo Descripción debe tener un máximo de 255 caracteres',
        ];
    }

}
