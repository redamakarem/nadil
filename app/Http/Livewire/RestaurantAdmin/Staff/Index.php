<?php

namespace App\Http\Livewire\RestaurantAdmin\Staff;

use Livewire\Component;

class Index extends Component
{

    public $users;
    public $restaurant;
    public function mount($restaurant)
    {
        $this->restaurant = $restaurant;
        $this->users = $restaurant->staff;
    }

    public function render()
    {
        return view('livewire.restaurant-admin.staff.index');
    }
}
