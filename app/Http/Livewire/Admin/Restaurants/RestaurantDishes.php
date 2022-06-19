<?php

namespace App\Http\Livewire\Admin\Restaurants;

use Livewire\Component;

class RestaurantDishes extends Component
{

    public $restaurant;
    public $dishes;

    public function mount($restaurant)
    {
        $this->restaurant = $restaurant;
        $this->dishes = $this->restaurant->dishes;
    }

    public function render()
    {
        return view('livewire.admin.restaurants.restaurant-dishes');
    }
}
