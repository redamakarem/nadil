<?php

namespace App\Http\Livewire\Admin\Dishes;

use App\Models\Restaurant;
use Livewire\Component;

class Create extends Component
{
    public Restaurant $restaurant;
    public function mount()
    {

    }


    public function render()
    {
        return view('livewire.admin.dishes.create');
    }
}
