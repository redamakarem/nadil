<?php

namespace App\Http\Livewire\Site\User\Profile;

use App\Models\Profile;
use Auth;
use Livewire\Component;

class Edit extends Component
{
    public Profile $profile;
    public $selected_date;

    protected $rules =[
        'profile.name' => ['required'],
        'profile.dob' => ['dob'],
        'profile.phone' => ['phone'],
        'profile.email' => ['email'],
        'profile.gender' => ['sometimes'],
        'profile.address' => ['address'],
    ];

    public function mount()
    {
        $this->profile = Auth::user()->profile?? new Profile();
        $this->profile->user_id = Auth::user()->id;
    }

    public function submit()
    {
        $this->profile->dob = $this->selected_date;
        $this->profile->save();
    }

    public function render()
    {
        return view('livewire.site.user.profile.edit');
    }
}
