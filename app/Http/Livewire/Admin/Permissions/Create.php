<?php

namespace App\Http\Livewire\Admin\Permissions;

use Livewire\Component;
use Spatie\Permission\Models\Permission;

class Create extends Component
{
    public Permission $permission;

    protected $rules = 
    [
        'permission.name' => ['required']
    ];

    public function mount()
    {
        $this->permission = new Permission();
        $this->permission->guard_name = 'web';
    }

    public function submit()
    {
        $this->validate();
        $this->permission->save();
        $this->permission = new Permission();
    }

    public function render()
    {
        return view('livewire.admin.permissions.create');
    }
}
