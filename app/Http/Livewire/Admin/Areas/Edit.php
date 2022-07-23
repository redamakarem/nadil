<?php

namespace App\Http\Livewire\Admin\Areas;

use App\Models\Area;
use Livewire\Component;
use App\Models\Governate;

class Edit extends Component
{
    public $governates;
    public $selected_governate;

    public Area $area;

    protected $rules = [
        'area.name_en' => ['required'],
        'area.name_ar' => ['required'],
        'selected_governate' => ['required'],
    ];

    public function mount(Area $area)
    {
        $this->area = $area;
        $this->governates = Governate::all();
        $this->selected_governate = $this->area->governate_id;
    }

    

    public function submit()
    {
        $this->validate();
        $this->area->governate_id = $this->selected_governate;
        $this->area->save();
        $this->area = new Area();
        $this->selected_governate = '';
    }

    public function render()
    {
        return view('livewire.admin.areas.edit');
    }
}
