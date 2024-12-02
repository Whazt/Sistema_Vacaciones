<?php

namespace App\Livewire\User;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class Show extends Component
{   
    public $open_edit=false;
    public $id,$name, $email, $role, $password;

    protected $listeners = ['actrender' => 'render'];

    public function edit($id){
        $user = User::find($id);
        $this->id = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->role = $user->roles->pluck('name')->join(', ');
        $this->open_edit = true;
    }

    public function update(){
        $request = new UserRequest();
       
        request()->merge(['id' => $this->id]);
        // Validar los datos usando las reglas y mensajes de la instancia
        
        $validatedData = $this->validate(
            $request->rules(true),
            $request->messages()
        );  
        $user = User::where('id', $this->id)->first();
        $user->update(
        [
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            
                
        ]);
        $user->syncRoles([$validatedData['role']]);
        $this->open_edit = false;
        $this->resetValidation();
        $this->dispatch('actrender');
    }

    public function delete(User $user){
        $user->delete();
    }

    public function cancelar()
    {
        $this->resetValidation();
        $this->open_edit = false;
    }

    public function resetPassword(){
        $this->password = '#Password123';
        $this->update();
    }

    public function render()
    {
        $users = User::with('roles')->get();
        return view('livewire.user.show', compact('users'));
    }
}
