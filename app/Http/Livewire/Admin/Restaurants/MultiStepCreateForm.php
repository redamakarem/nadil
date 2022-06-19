<?php

namespace App\Http\Livewire\Admin\Restaurants;

use App\Models\Restaurant;
use Livewire\Component;

class MultiStepCreateForm extends Component
{
    public $cuisines;
    public $users;
    public $steps;
    public $current_step;
    public $restaurant;


    protected $rules = [
        'restaurant.name_en' => ['required'],
        'restaurant.name_ar' => ['required'],
    ];
    public function mount($cuisines,$users, Restaurant $restaurant)
    {
        $this->cuisines = $cuisines;
        $this->users = $users;
        $this->restaurant = $restaurant;
        $this->steps = ['Restaurant Info','Owner','Cuisines & Meal Types'];
        $this->current_step = 0;
    }

    public function next_step()
    {
        $this->validate([
            'restaurant.name_en' => ['required'],
            'restaurant.name_ar' => ['required'],
            'restaurant.email' => ['required'],
            'restaurant.address' => ['required'],
            'restaurant.phone' => ['required'],
            'restaurant.coordinates' => ['required'],
        ]);
        if ($this->current_step < count($this->steps))
        {
            $this->current_step++;
        }
    }
    public function prev_step()
    {

        if ($this->current_step > 0)
        {
            $this->current_step--;
        }
    }

    public function render()
    {
        return view('livewire.admin.restaurants.multi-step-create-form');
    }
}
