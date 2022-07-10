<?php

namespace App\Http\Livewire\RestaurantAdmin\Schedule;

use App\Models\Restaurant;
use Livewire\Component;

class Index extends Component
{
    public Restaurant $restaurant;
    public $schedules;

    public function mount(Restaurant $restaurant)
    {
        $this->restaurant = $restaurant;
        $this->schedules = $this->restaurant->schedules;
    }

    public function render()
    {
        return view('livewire.restaurant-admin.schedule.index');
    }
}
