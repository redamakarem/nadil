<?php

namespace App\Http\Livewire\RestaurantAdmin\DishNew;

use Auth;
use Livewire\Component;

class Create extends Component
{

    public $restaurants;
    public $selected_restaurant;
    public $menus;
    public $selected_menu;

    public function mount()
    {
        $this->restaurants = Auth::user()->restaurants;
    }

    public function updatedSelectedRestaurant($value)
    {
        $this->selected_restaurant->load('menus');
        $this->menus = $this->selected_restaurant->menus;
    }

    public function render()
    {
        return view('livewire.restaurant-admin.dish-new.create');
    }
}
