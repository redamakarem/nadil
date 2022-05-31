<?php

namespace App\Http\Livewire\Admin\DishesCategory;

use Livewire\Component;

class Index extends Component
{
    public $categories;
    public $restaurant_id;
    public $menu_id;

    public function mount($categories,$restaurant_id,$menu_id)
    {
        $this->categories = $categories;
        $this->restaurant_id = $restaurant_id;
        $this->menu_id = $menu_id;
    }

    public function render()
    {
        return view('livewire.admin.dishes-category.index');
    }
}
