<?php

namespace App\Http\Livewire\Site\Restaurant;

use App\Models\Restaurant;
use Livewire\Component;

class Menu extends Component
{

    public Restaurant $restaurant;
    public function render()
    {
        return view('livewire.site.restaurant.menu');
    }

    public function mount($restaurant)
    {
        $this->restaurant = $restaurant;

    }
}
