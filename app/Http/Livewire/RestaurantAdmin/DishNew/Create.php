<?php

namespace App\Http\Livewire\RestaurantAdmin\DishNew;

use Auth;
use Livewire\Component;

class Create extends Component
{

    public $restaurants;
    public $selected_restaurant;

    public function mount()
    {
        $this->restaurants = Auth::user()->restaurants;
    }

    public function render()
    {
        return view('livewire.restaurant-admin.dish-new.create');
    }
}
