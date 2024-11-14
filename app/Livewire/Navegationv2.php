<?php

namespace App\Livewire;

use Livewire\Component;

class Navegationv2 extends Component
{
    public function toggleSidebar()
    {
        $this->dispatch('toggleSidebar'); // Emitir el evento para alternar el estado del sidebar
    }
    public function render()
    {
        return view('livewire.navegationv2');
    }
}
