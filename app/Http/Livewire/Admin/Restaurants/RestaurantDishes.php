<?php

namespace App\Http\Livewire\Admin\Restaurants;

use App\Models\Dish;
use Livewire\Component;

class RestaurantDishes extends Component
{

    public $restaurant;
    public $dishes;

    public $idToRemove;


    protected $listeners = ['dishDeleteConfirmed' => 'deleteDish'];




    public function confirmDishDeletion($id)
    {
        $this->idToRemove = $id;
        $this->dispatchBrowserEvent('show-swal-delete');
    }

    public function deleteDish()
    {
        $cuisine = Dish::findOrFail($this->idToRemove);
        $cuisine->delete();
    }

    public function mount($restaurant)
    {
        $this->restaurant = $restaurant;
        $this->dishes = $this->restaurant->dishes;
    }

    public function render()
    {
        return view('livewire.admin.restaurants.restaurant-dishes');
    }
}
