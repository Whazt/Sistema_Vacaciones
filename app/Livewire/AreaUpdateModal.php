<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Area;

class AreaUpdateModal extends Component
{
    public $open = false;

    public $area;
    
    public function save(Area $area)
    {

        $this->area->save();

        $this->reset(['open']);

    }

    public function render()
    {
        return view('livewire.area-update-modal');
    }
}
