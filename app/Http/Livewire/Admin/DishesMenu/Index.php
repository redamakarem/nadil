<?php

namespace App\Http\Livewire\Admin\DishesMenu;

use App\Models\Restaurant;
use Livewire\Component;

class Index extends Component
{

    public Restaurant $restaurant;

    public $menus;

    public function mount(Restaurant $restaurant)
    {
        $this->restaurant = $restaurant;
        $this->menus = $restaurant->menus;
//        dd($this->menus);
    }

    public function render()
    {
        return view('livewire.admin.dishes-menu.index');
    }
}
