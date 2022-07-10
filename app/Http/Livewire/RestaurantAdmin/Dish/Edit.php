<?php

namespace App\Http\Livewire\RestaurantAdmin\Dish;

use App\Models\Dish;
use App\Models\Cuisine;
use Livewire\Component;
use App\Models\DishesMenu;
use App\Models\Restaurant;
use App\Models\DishesCategory;
use Spatie\MediaLibraryPro\Http\Livewire\Concerns\WithMedia;

class Edit extends Component
{

    use WithMedia;

    public Restaurant $restaurant;

    public DishesMenu $dishesMenu;

    public DishesCategory $category;

    public array $listsForFields = [];
    public Dish $dish;
    public $cuisines;
    public $selected_cuisine;
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
        'selected_cuisine' => ['required'],
    ];

    public function mount(Restaurant $restaurant,DishesMenu $menu,DishesCategory $category,Dish $dish)
    {

        $this->restaurant = $restaurant;
        $this->dishesMenu = $menu;
        $this->category = $category;
        $this->dish = $dish;
        $this->cuisines = Cuisine::all();
        $this->selected_cuisine = $this->dish->cuisine_id;
        

    }

    public function submit()
    {
        $this->dish->restaurant_id = $this->restaurant->id;
        $this->dish->menu_id = $this->dishesMenu->id;
        $this->dish->cuisine_id = $this->selected_cuisine;
        $this->validate();
        $this->dish->save();
        $this->dish->categories()->sync($this->category->id);
        $this->dish->syncFromMediaLibraryRequest($this->dish_image)->toMediaCollection('dish_images');

    }



    public function render()
    {
        return view('livewire.restaurant-admin.dish.edit');
    }
}
