<?php

namespace App\Http\Livewire\Admin\Areas;

use App\Models\Area;
use App\Models\Governate;
use Livewire\Component;

class Index extends Component
{

    public $governates;
    public $areas;

    public function mount()
    {
        $this->governates = Governate::all();
        $this->areas = Area::all();
    }

    public function render()
    {
        return view('livewire.admin.areas.index');
    }
}
