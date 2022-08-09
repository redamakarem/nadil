<?php

namespace App\Http\Livewire\Admin\Users;

use Livewire\Component;
use Spatie\Permission\Models\Role;



class Roles extends Component
{
    public $users;

    public function mount($users)
    {
        $this->users = $users;
    }

    public function render()
    {
        return view('livewire.admin.users.roles');
    }
}
