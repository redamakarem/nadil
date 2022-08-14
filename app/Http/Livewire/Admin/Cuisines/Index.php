<?php

namespace App\Http\Livewire\Admin\Cuisines;

use App\Models\Cuisine;
use App\Models\Restaurant;
use Livewire\Component;

class Index extends Component
{

    public $idToRemove;


    protected $listeners = ['cuisineDeleteConfirmed' => 'deleteCuisine'];




    public function confirmCuisineDeletion($id)
    {
        $this->idToRemove = $id;
        $this->dispatchBrowserEvent('show-swal-delete');
    }

    public function deleteCuisine()
    {
        $cuisine = Cuisine::findOrFail($this->idToRemove);
        $cuisine->delete();
    }


    public function render()
    {
        $cuisines = Cuisine::all();
        return view('livewire.admin.cuisines.index', compact('cuisines'));
    }
}
