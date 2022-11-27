<?php

namespace App\Http\Livewire\RestaurantAdmin\Restaurant;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Traits\HasRoles;

class Index extends Component
{
    public $restaurants;

    public function mount()
    {
        $this->restaurants = auth()->user()->restaurants;
        if(auth()->user()->hasRole('restaurant-admin')){
            $this->restaurants = auth()->user()->workplace;
        }
    }

    public function render()
    {
        return view('livewire.restaurant-admin.restaurant.index');
    }
}
