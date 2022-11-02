<?php

namespace App\Http\Livewire\RestaurantAdmin\DishNew;

use App\Models\Cuisine;
use App\Models\Dish;
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
    public $cuisines;
    public $selected_cuisine;
    public Dish $new_dish;

    public function mount()
    {
        $this->restaurants = Auth::user()->restaurants;
        $this->cuisines = Cuisine::all();
        $this->new_dish = new Dish();
    }

    protected $rules = [
        'new_dish.name_en' =>['required'],
        'new_dish.name_ar' =>['required'],
        'new_dish.description_en' =>['required'],
        'new_dish.description_ar' =>['required'],
        'new_dish.prep_time' =>['required'],
    ];

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

    public function submit()
    {
        $this->validate();
        $this->new_dish->restaurant_id = $this->selected_restaurant_id;
        $this->new_dish->menu_id = $this->selected_menu;
        $this->new_dish->cuisine_id = $this->selected_cuisine;
        $this->new_dish->save();
    }
}
