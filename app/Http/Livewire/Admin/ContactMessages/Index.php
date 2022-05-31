<?php

namespace App\Http\Livewire\Admin\ContactMessages;

use App\Models\Cuisine;
use App\Models\SiteContact;
use Livewire\Component;

class Index extends Component
{

    public $idToRemove;


    protected $listeners = ['deleteConfirmed' => 'deleteCuisine'];


    public function render()
    {
        $contact_messages = SiteContact::all();
        return view('livewire.admin.contact-messages.index', compact('contact_messages'));
    }

    public function confirmMessageDeletion($id)
    {
        $this->idToRemove = $id;
        $this->dispatchBrowserEvent('show-swal-delete');
    }

    public function deleteCuisine()
    {
        $cuisine = Cuisine::findOrFail($this->idToRemove);
        $cuisine->delete();
    }
}
