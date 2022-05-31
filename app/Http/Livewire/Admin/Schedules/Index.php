<?php

namespace App\Http\Livewire\Admin\Schedules;

use App\Models\Restaurant;
use Livewire\Component;

class Index extends Component
{

    public Restaurant $restaurant;

    public $schedules;

    public function mount(Restaurant $restaurant)
    {
        $this->restaurant = $restaurant;
        $this->schedules = $restaurant->schedules;
//        dd($this->menus);
    }
    public function render()
    {
        return view('livewire.admin.schedules.index');
    }
}
