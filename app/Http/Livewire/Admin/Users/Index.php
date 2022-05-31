<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Component;

class Index extends Component
{

    public $state;

    public function mount()
    {
        $this->state=[];
        $this->state['users']=User::with('roles')->get();
    }

    public function render()
    {
        return view('livewire.admin.users.index');
    }
}
