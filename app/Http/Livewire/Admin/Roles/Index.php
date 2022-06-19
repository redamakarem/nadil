<?php

namespace App\Http\Livewire\Admin\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class Index extends Component
{

    public $roles;


    public function mount()
    {
        $this->roles = Role::all();
    }
    public function render()
    {
        return view('livewire.admin.roles.index');
    }
}
