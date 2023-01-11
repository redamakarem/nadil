<?php

namespace App\Http\Livewire\Admin\DishesNew;

use App\Models\Dish;
use Livewire\Component;

class Index extends Component
{
    public $dishes;

    public function mount()
    {
        $this->dishes = Dish::all();
    }
    public function render()
    {
        return view('livewire.admin.dishes-new.index');
    }
}
