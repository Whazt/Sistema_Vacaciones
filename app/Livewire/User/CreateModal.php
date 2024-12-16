<?php

namespace App\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRequest;
use Livewire\Component;

class CreateModal extends Component
{
    public $name, $email, $role='Empleado', $password='#Password123';
    public $open = false;
    
    public function store()
    {
        $request = new UserRequest();
        $validatedData = $this->validate(
            $request->rules(),
            $request->messages()
        );
        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => $validatedData['password'],
        ])->assignRole($validatedData['role']);
        $this->resetValidation();
        $this->open = false;
        $this->resetForm();
        $this->dispatch('actrender');
    }

    public function resetForm()
    {
        $this->name = null;
        $this->email = null;
        $this->role = null;
    }

    public function cancelar()
    {
        $this->resetValidation();
        $this->open = false;
        $this->resetForm();
    }

    public function render()
    {
        return view('livewire.user.create-modal');
    }
}
 