<?php

namespace App\Actions\Fortify;

use App\Models\Empleado;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
            'nombres' => ['required', 'string', 'max:255'],
            'apellidos' => ['required', 'string', 'max:255'],
            'id_cargo' => ['nullable', 'integer'],
            'fecha_ingreso' => ['required', 'date'],
            'telefono' => ['required', 'string', 'max:255'],
            'id_jefe' => ['nullable', 'integer'],
        ])->validate();

        $user = User::create([
            'name' => $input['nombres'].' '.$input['apellidos'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ])->assignRole('Empleado');

        Empleado::create([
            'nombres' => $input['nombres'],
            'apellidos' => $input['apellidos'],
            'correo' => $input['email'],
            'fecha_ingreso' => $input['fecha_ingreso'],
            'telefono' => $input['telefono'],
        ]);
        
        return $user;
    }
}
