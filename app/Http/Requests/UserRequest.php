<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
    public function rules(): array
    {
        $idUsuario = request()->input('id');
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => 'required|string|email|max:255|unique:users,email,'.$idUsuario,
            'password' => 'required|string|min:8',
            'role' => 'required|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El campo Nombre es obligatorio',
            'name.string' => 'El campo Nombre debe ser de tipo string',
            'name.max' => 'El campo Nombre debe tener un máximo de 255 caracteres',
            'email.required' => 'El campo Correo es obligatorio',
            'email.string' => 'El campo Correo debe ser de tipo string',
            'email.email' => 'El campo Correo debe ser un correo electrónico válido',
            'email.max' => 'El campo Correo debe tener un máximo de 255 caracteres',
            'password.required' => 'El campo Contraseña es obligatorio',
            'password.string' => 'El campo Contraseña debe ser de tipo string',
            'password.min' => 'El campo Contraseña debe tener un mínimo de 8 caracteres',
            'role.required' => 'El campo Rol es obligatorio',
            'role.string' => 'El campo Rol debe ser de tipo string',
            'role.max' => 'El campo Rol debe tener un máximo de 255 caracteres',
        ];  
    }
}
