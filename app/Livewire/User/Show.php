<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;

class Show extends Component
{
    public function render()
    {
        $users = User::all();
        return view('livewire.user.show', compact('users'));
    }
}
