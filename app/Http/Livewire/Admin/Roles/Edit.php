<?php

namespace App\Http\Livewire\Admin\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Edit extends Component
{

public Role $role;
public $permissions;
public $selected_permissions;

public function mount($role)
{
    $this->role = $role;
    $this->permissions = Permission::all();
}

    public function render()
    {
        return view('livewire.admin.roles.edit');
    }
}
