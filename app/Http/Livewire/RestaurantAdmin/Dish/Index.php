<?php

namespace App\Http\Livewire\RestaurantAdmin\Dish;

use App\Models\DishesCategory;
use App\Models\DishesMenu;
use App\Models\Restaurant;
use Livewire\Component;

class Index extends Component
{
    public Restaurant $restaurant;
    public DishesMenu $menu;
    public DishesCategory $category;
    public $dishes;

    public function mount(Restaurant $restaurant,DishesMenu $menu,DishesCategory $category)
    {
        $this->restaurant = $restaurant;
        $this->menu = $menu;
        $this->category = $category;
        $this->dishes = $this->category->dishes;

    }


    public function render()
    {
        return view('livewire.restaurant-admin.dish.index');
    }
}
