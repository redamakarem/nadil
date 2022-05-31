<?php

namespace App\Http\Livewire\RestaurantAdmin\Catalogue;

use App\Models\Restaurant;
use Livewire\Component;

class Index extends Component
{
    public  Restaurant $restaurant;
    public $menus;
    public function render()
    {
        return view('livewire.restaurant-admin.catalogue.index');
    }

    public function mount($restaurant)
    {
        $this->restaurant = $restaurant;
        $this->menus = $this->restaurant->menus;
    }
}
