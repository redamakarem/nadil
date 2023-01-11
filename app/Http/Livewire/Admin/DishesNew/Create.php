<?php

namespace App\Http\Livewire\Admin\DishesNew;

use App\Models\Cuisine;
use App\Models\Dish;
use App\Models\DishesMenu;
use App\Models\Restaurant;
use Livewire\Component;

class Create extends Component
{
    public Dish $dish;
    public $restaurants;
    public $selected_restaurant;
    public $menus;
    public $selected_menu;
    public $cuisines;
    public $selected_cuisine;
    public $categories;
    public $selected_category;
    public $mediaComponentNames = ['dish_image'];
    public $dish_image;

    protected $rules = [
        'dish.name_en' => ['required'],
        'dish.name_ar' => ['required'],
        'dish.description_en' => ['required'],
        'dish.description_ar' => ['required'],
        'dish.price' => ['required','numeric'],
        'dish.prep_time' => ['required'],
        'dish.restaurant_id' => ['required'],
        'dish.menu_id' => ['required'],
        'dish.cuisine_id' => ['required'],
        'selected_menu' => ['required'],
        'dish.is_featured' => ['sometimes'],
        'dish.is_active' => ['sometimes']
    ];

    public function mount()
    {
        $this->dish = new Dish();
        $this->restaurants = Restaurant::all();
        $this->cuisines = Cuisine::all();
        $this->selected_restaurant = null;
    }


    public function updatedSelectedRestaurant($value)
    {
        if($this->selected_restaurant){
            $this->menus = Restaurant::findOrFail($value)->menus;
            
        }
    }

    public function updatedSelectedMenu($value)
    {
        $this->categories = DishesMenu::findOrFail($value)->categories;
        
    }
    public function submit()
    {
        $this->dish->menu_id = $this->selected_menu;
        $this->dish->cuisine_id = $this->selected_cuisine;
        $this->dish->restaurant_id = $this->selected_restaurant;
        $this->validate();
        $this->dish->save();
        $this->dish->categories()->sync([$this->selected_category]);
        $this->dish->addFromMediaLibraryRequest($this->dish_image)->toMediaCollection('dish_images');
    }

    public function render()
    {
        return view('livewire.admin.dishes-new.create');
    }
}
