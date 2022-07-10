<?php

namespace App\Http\Livewire\Admin\DishesCategory;

use App\Models\DishesCategory;
use App\Models\DishesMenu;
use App\Models\Restaurant;
use Livewire\Component;

class Create extends Component
{
    public $name_en;
    public $name_ar;
    public  $menu;
    public  $restaurant;

    protected $rules = [
        'name_en' =>'required',
        'name_ar' =>'required'
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
            'name_en' => $this->name_en,
            'name_ar' => $this->name_ar,
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
