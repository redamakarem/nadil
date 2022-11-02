<?php

namespace App\Http\Livewire\RestaurantAdmin\DishNew;

use App\Models\Restaurant;
use Auth;
use Livewire\Component;

class Create extends Component
{

    public $restaurants;
    public $selected_restaurant_id;
    public $selected_restaurant;
    public $menus;
    public $selected_menu;

    public function mount()
    {
        $this->restaurants = Auth::user()->restaurants;
    }

    public function updatedSelectedRestaurantId($value)
    {
        $this->selected_restaurant = Restaurant::findOrFail($this->selected_restaurant_id);
        $this->selected_restaurant->load('menus');
        $this->menus = $this->selected_restaurant->menus;
    }

    public function render()
    {
        return view('livewire.restaurant-admin.dish-new.create');
    }
}
