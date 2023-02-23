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
        'profile.dob' => ['required','date'],
        'profile.phone' => ['numeric'],
        'profile.email' => ['email'],
        'profile.gender' => ['sometimes'],
        'profile.address' => ['required'],
    ];

    public function mount()
    {
        $this->profile = Auth::user()->profile?? new Profile();
        $this->profile->user_id = Auth::user()->id;
    }

    public function submit()
    {
        $this->validate();
        $this->profile->dob = $this->selected_date;
        $this->profile->save();
    }

    public function render()
    {
        return view('livewire.site.user.profile.edit');
    }
}
