<?php

namespace App\Http\Livewire\Admin\Components;

use App\Models\RestaurantRegistration;
use Livewire\Component;

class RestaurantRegistrationSubmissionsBox extends Component
{

    protected $listeners = ['restaurantRegistrationRequest' =>'render'];

    public function render()
    {
        return view('livewire.admin.components.restaurant-registration-submissions-box',
        ['registrationRequests' =>RestaurantRegistration::count()]);
    }
}
