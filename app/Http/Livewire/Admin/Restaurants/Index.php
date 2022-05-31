<?php

namespace App\Http\Livewire\Admin\Restaurants;

use App\Models\Restaurant;
use Livewire\Component;

class Index extends Component
{

    public $idToRemove;

    protected $listeners = ['deleteConfirmed' => 'deleteRestaurant'];

    public function render()
    {
        $restaurants = Restaurant::with('owner')->get();
        return view('livewire.admin.restaurants.index',compact('restaurants'));
    }

    public function confirmRestaurantDeletion($id)
    {
        $this->idToRemove = $id;
        $this->dispatchBrowserEvent('show-swal-delete');
    }

     public function deleteRestaurant()
    {
        $restaurant = Restaurant::findOrFail($this->idToRemove);
        $restaurant->delete();
    }

}
