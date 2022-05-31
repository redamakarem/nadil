<?php

namespace App\Http\Livewire\Admin\DishesMenu;

use App\Models\DishesMenu;
use App\Models\Restaurant;
use Livewire\Component;

class Edit extends Component
{
    public Restaurant $restaurant;
    public DishesMenu $menu;
    public $start_date;
    public $end_date;
    public $start_time;
    public $end_time;

    protected $rules = [
        'menu.name' => 'required',
        'start_date' => 'required',
        'end_date' => 'required',
        'start_time' => 'required',
        'end_time' => 'required',
    ];


    public function mount($restaurant, $menu)
    {
        $this->restaurant = $restaurant;
        $this->menu = $menu;
        $this->start_date = $menu->from_date;
        $this->end_date = $menu->to_date;
        $this->start_time = $menu->from_time;
        $this->end_time = $menu->to_time;

//        dd($this->start_date,$this->end_date,$this->start_time,$this->end_time);
    }

    public function submit()
    {
        $this->validate();
        $this->menu->restaurant_id = $this->restaurant->id;
        $this->menu->from_date = $this->start_date;
        $this->menu->to_date = $this->end_date;
        $this->menu->from_time = $this->start_time;
        $this->menu->to_time = $this->end_time;
        $this->menu->save();
    }

    public function render()
    {
        return view('livewire.admin.dishes-menu.edit');
    }
}
