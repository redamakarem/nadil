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

    protected $rules =
    [
        'role.name' => ['required']
    ];

    public function mount($role)
    {
        $this->role = $role;
        $this->permissions = Permission::all();
        $this->selected_permissions = $this->role->permissions->pluck('id')->toArray();
    }


    public function submit()
    {
        $this->validate();
        $this->role->syncPermissions($this->selected_permissions);
        $this->role->save();
    }


    public function render()
    {
        return view('livewire.admin.roles.edit');
    }
}
