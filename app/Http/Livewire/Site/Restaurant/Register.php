<?php

namespace App\Http\Livewire\Site\Restaurant;

use App\Models\RestaurantRegistration;
use Livewire\Component;

class Register extends Component
{

    public $form_data;


    protected $rules = [
        'form_data.name' =>'required',
        'form_data.owner' =>'required',
        'form_data.locations' =>'required|numeric',
        'form_data.email' =>'required|email',
        'form_data.phone' =>'required',
    ];

    protected $messages = [

        'form_data.name.required' => 'The restaurant name cannot be empty.',
        'form_data.owner.required' => 'The owner name cannot be empty.',
        'form_data.locations.required' => 'The number of locations cannot be empty.',
        'form_data.locations.numeric' => 'The number of locations must be a number.',
        'form_data.email.required' => 'The email cannot be empty.',
        'form_data.email.email' => 'The email must be a valid email address.',
        'form_data.phone.required' => 'The phone number cannot be empty .',

    ];

    public function render()
    {
        return view('livewire.site.restaurant.register');
    }

    public function register()
    {
        $this->validate();
        RestaurantRegistration::create([
            'name' => $this->form_data['name'],
            'owner_name' => $this->form_data['owner'],
            'num_locations' => $this->form_data['locations'],
            'email' => $this->form_data['email'],
            'phone' => $this->form_data['phone'],
        ]);
        $this->emit('restaurantRegistrationRequest');
        $this->reset();

    }


    public function mount()
    {
        $this->form_data = [];
    }
}
