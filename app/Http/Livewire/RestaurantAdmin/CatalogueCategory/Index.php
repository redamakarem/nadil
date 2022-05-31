<?php

namespace App\Http\Livewire\RestaurantAdmin\CatalogueCategory;

use App\Models\DishesMenu;
use App\Models\Restaurant;
use Livewire\Component;

class Index extends Component
{
    public Restaurant $restaurant;
    public  DishesMenu $menu;
    public $categories;
    public function mount($restaurant,$menu)
    {
        $this->restaurant = $restaurant;
        $this->menu = $menu;
        $this->categories = $this->menu->categories;
    }
    public function render()
    {
        return view('livewire.restaurant-admin.catalogue-category.index');
    }
}
