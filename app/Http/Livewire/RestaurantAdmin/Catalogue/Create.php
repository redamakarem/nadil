<?php

namespace App\Http\Livewire\RestaurantAdmin\Catalogue;

use App\Models\DishesMenu;
use App\Models\Restaurant;
use Livewire\Component;

class Create extends Component
{
    public $name;
    public $start_date;
    public $end_date;
    public $start_time;
    public $end_time;
    public  $route;
    public Restaurant $restaurant;

    protected $listeners = ['menuAdded' => 'goToMenus'];

    protected $rules = [
        'name' => 'required',
        'start_date' => 'required',
        'end_date' => 'required',
        'start_time' => 'required',
        'end_time' => 'required',
    ];

    public function mount($restaurant)
    {
        $this->restaurant = $restaurant;
        $this->route = url()->previous();
    }

    public function goToMenus()
    {
        $this->redirect($this->route);
    }

    public function render()
    {
        return view('livewire.restaurant-admin.catalogue.create');
    }

    public function submit()
    {
        $this->validate();

//        dd($this->name, $this->start_date, $this->end_date,$this->start_time,$this->end_time);
        DishesMenu::create([
            'name' => $this->name,
            'restaurant_id' => $this->restaurant->id,
            'from_date' => $this->start_date,
            'to_date' => $this->end_date,
            'from_time' => $this->start_time,
            'to_time' => $this->end_time,
        ]);
        $this->reset_form();
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Menu created Successfully!!"
        ]);
    }

    public function reset_form()
    {
        $this->name = '';
        $this->start_date = '';
        $this->end_date = '';
        $this->start_time = '';
        $this->end_time = '';
    }
}
