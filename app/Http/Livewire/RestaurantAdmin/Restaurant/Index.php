<?php

namespace App\Http\Livewire\RestaurantAdmin\Restaurant;

use Livewire\Component;

class Index extends Component
{

    public $restaurants;

    public function mount()
    {
        $this->restaurants = auth()->user()->restaurants;
    }

    public function render()
    {
        return view('livewire.restaurant-admin.restaurant.index');
    }
}
