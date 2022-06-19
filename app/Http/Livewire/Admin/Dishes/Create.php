<?php

namespace App\Http\Livewire\Admin\Dishes;

use App\Models\Cuisine;
use App\Models\Dish;
use App\Models\DishesCategory;
use App\Models\DishesMenu;
use App\Models\Restaurant;
use Livewire\Component;

class Create extends Component
{
    public $restaurant;
    public $cuisines;
    public $menus;
    public $categories;
    public $selected_menu;
    public $selected_cuisine;
    public $selected_category;
    public Dish $dish;

    public $mediaComponentNames = ['dish_image'];
    public $dish_image;

    protected $rules = [
        'dish.name_en' => ['required'],
        'dish.name_ar' => ['required'],
        'dish.description' => ['required'],
        'dish.price' => ['required','numeric'],
        'dish.prep_time' => ['required'],
        'dish.restaurant_id' => ['required'],
        'dish.menu_id' => ['required'],
        'dish.cuisine_id' => ['required'],
        'selected_menu' => ['required']
    ];

    public function mount($restaurant,Dish $dish)
    {
        $this->restaurant = $restaurant;
        $this->cuisines = Cuisine::all();
        $this->menus = $this->restaurant->menus;
        $this->dish = $dish;
        $this->selected_menu = null;
    }

    public function updatedSelectedMenu($value)
    {
        $this->categories= DishesMenu::findOrFail($value)->categories;
    }



    public function submit()
    {
        $this->dish->menu_id = $this->selected_menu;
        $this->dish->cuisine_id = $this->selected_cuisine;
        $this->dish->restaurant_id = $this->restaurant->id;


        $this->validate();
        $this->dish->save();
        $this->dish->categories()->sync([$this->selected_category]);
        $this->dish->addFromMediaLibraryRequest($this->dish_image)->toMediaCollection('dish_images');

    }


    public function render()
    {
        return view('livewire.admin.dishes.create');
    }
}
