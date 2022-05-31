<?php

namespace App\Http\Livewire\RestaurantAdmin\CatalogueCategory;

use App\Models\DishesMenu;
use App\Models\Restaurant;
use Livewire\Component;

class Create extends Component
{
    public Restaurant $restaurant;
    public DishesMenu $menu;
    public $name;

    protected $rules = [
        'name' =>['required']
    ];

    public function mount(Restaurant $restaurant, DishesMenu $menu)
    {
        $this->restaurant = $restaurant;
        $this->menu = $menu;
        $this->name="";
    }

    public function submit()
    {
        $this->validate();
        $this->menu->categories()->create(['name' =>$this->name]);
    }
    public function render()
    {
        return view('livewire.restaurant-admin.catalogue-category.create');
    }
}
