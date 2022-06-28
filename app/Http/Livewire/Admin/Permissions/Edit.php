<?php

namespace App\Http\Livewire\Admin\Permissions;

use Livewire\Component;
use Spatie\Permission\Models\Permission;

class Edit extends Component
{
    protected $rules = 
    [
        'permission.name' => ['required']
    ];

    public Permission $permission;

    public function mount($permission)
    {
        $this->permission = $permission;
    }

    public function render()
    {
        return view('livewire.admin.permissions.edit');
    }

    public function submit()
    {
        $this->validate();
        $this->permission->save();
    }
}
