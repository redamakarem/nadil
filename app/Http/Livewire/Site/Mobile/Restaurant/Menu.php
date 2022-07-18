<?php

namespace App\Http\Livewire\Site\Mobile\Restaurant;

use App\Models\DishesCategory;
use App\Models\DishesMenu;
use App\Models\Restaurant;
use Livewire\Component;

class Menu extends Component
{
    public Restaurant $restaurant;
    public DishesMenu $menu;
    public $categories;


    public function mount($restaurant)
    {
        $this->restaurant = $restaurant->load(['menus','menus.categories','menus.categories.dishes']);
        $this->menu = $this->restaurant->menus[0];
        $this->categories = $this->menu->categories;
        
        
    }

    public function render()
    {
        return view('livewire.site.mobile.restaurant.menu');
    }
}
