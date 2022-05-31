<?php

namespace App\Http\Livewire\Admin\DishesCategory;

use App\Models\DishesCategory;
use App\Models\DishesMenu;
use App\Models\Restaurant;
use Livewire\Component;

class Create extends Component
{
    public $name;
    public  $menu;
    public  $restaurant;

    protected $rules = [
        'name' =>'required'
    ];

    protected $listeners = ['categoryAdded' => 'goToCategories'];


    public function mount($menu,$restaurant)
    {
        $this->menu = $menu;
        $this->restaurant = $restaurant;
//        dd($this->restaurant, $this->menu);
    }

    public function submit()
    {
        $this->validate();
        DishesCategory::create([
            'name' => $this->name,
            'catalogue_id' => $this->menu->id
        ]);

        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Category created Successfully!!"
        ]);
    }


    public function goToCategories()
    {
        $this->redirect(route('admin.restaurants.menus.categories',['restaurant' =>$this->restaurant,'id' =>$this->menu->id]));
    }

    public function render()
    {
        return view('livewire.admin.dishes-category.create');
    }
}
