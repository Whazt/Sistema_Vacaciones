<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Area;

use function Termwind\render;

class AreaShow extends Component
{
    public $area;
    protected $listeners = ['actrender' => 'render'];

    public function render()
    {
        $areas = Area::all();
        return view('livewire.area-show', compact('areas'));
    }


    public function delete(Area $area){
        $area->delete();
    }
}
