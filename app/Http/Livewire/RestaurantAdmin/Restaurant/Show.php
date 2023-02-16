<?php

namespace App\Http\Livewire\RestaurantAdmin\Restaurant;

use Livewire\Component;

class Show extends Component
{

    public $bookings;
    public $dishes;
    public $restaurant;

    public function mount($restaurant)
    {
        $this->restaurant = $restaurant;
        $this->bookings = $this->restaurant->bookings->count();
        $this->dishes = $this->restaurant->dishes->count();
        // dd($this->bookings,$this->restaurant,$this->dishes);
    }

    public function render()
    {
        return view('livewire.restaurant-admin.restaurant.show');
    }
}
