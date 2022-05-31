<?php

namespace App\Http\Livewire\Site;

use App\Models\SiteContact;
use Livewire\Component;

class Contact extends Component
{
    public SiteContact $contact;

    public function render()
    {
        return view('livewire.site.contact');
    }


    public function mount(SiteContact $contact)
    {
        $this->contact = $contact;
    }

    protected $rules = [
        'contact.name' => ['required'],
        'contact.email' => ['required','email'],
        'contact.subject' => ['required'],
        'contact.message' => ['required'],
    ];

    public function submit()
    {
        $this->validate();
        $this->contact->save();
        $this->contact= new SiteContact();
        session()->flash('success','Contact sent successfully');
    }
}
