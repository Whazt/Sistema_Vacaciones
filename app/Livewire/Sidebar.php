<?php

namespace App\Livewire;

use Livewire\Component;

class Sidebar extends Component
{
    public $sidebarOpen = false;
    protected $listeners = ['toggleSidebar' => 'toggle'];

    public function toggle()
    {
        $this->sidebarOpen = ! $this->sidebarOpen;
    }

    public function render()
    {
        return view('livewire.sidebar');
    }
}
