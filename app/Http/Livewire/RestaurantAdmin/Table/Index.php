<?php

namespace App\Http\Livewire\RestaurantAdmin\Table;

use App\Models\Restaurant;
use Livewire\Component;

class Index extends Component
{

    public Restaurant $restaurant;

    public function mount(Restaurant $restaurant)
    {
        $this->restaurant = $restaurant;
    }

    public function render()
    {
        return view('livewire.restaurant-admin.table.index');
    }
}
