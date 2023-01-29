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
        // dd(auth()->user()->getRoleNames());
        if(auth()->user()->hasAnyRole(['restaurant-admin','restaurant-host','restaurant-manager'])){
            $this->restaurants = auth()->user()->workplace;
        }
        else{
            $this->restaurants = auth()->user()->restaurants;
        }
        
        // dd($this->restaurants);
        // if(auth()->user()->hasRole('restaurant-admin')){
        //     $this->restaurants = auth()->user()->workplace;
        // }
    }

    public function render()
    {
        return view('livewire.restaurant-admin.restaurant.index');
    }
}
