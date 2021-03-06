<?php

namespace App\Http\Livewire\Site\User\Profile;

use App\Models\Profile;
use Auth;
use Livewire\Component;

class Edit extends Component
{
    public Profile $profile;

    protected $rules =[
        'profile.name' => ['required'],
        'profile.dob' => ['dob'],
        'profile.phone' => ['phone'],
        'profile.email' => ['email'],
        'profile.gender' => ['gender'],
        'profile.address' => ['address'],
    ];

    public function mount()
    {
        $this->profile = Auth::user()->profile;
    }

    public function submit()
    {
        $this->profile->save();
    }

    public function render()
    {
        return view('livewire.site.user.profile.edit');
    }
}
