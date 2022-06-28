<?php

namespace App\Http\Livewire\Admin\Permissions;

use Livewire\Component;
use Spatie\Permission\Models\Permission;

class Index extends Component
{
    public $permissions;

    protected $listeners = [
        'deleteConfirmed' => 'deletePermission',
        'refresh' => '$refresh',
    ];


    public function mount()
    {
        $this->permissions = Permission::all();
    }

    public function confirmPermissionDeletion($id)
    {
        $this->idToRemove = $id;
        $this->dispatchBrowserEvent('show-swal-delete');
    }

    public function deletePermission()
    {
        $permission = Permission::findOrFail($this->idToRemove);
        $permission->delete();
        $this->emitSelf('refresh');
    }

    public function render()
    {
        return view('livewire.admin.permissions.index');
    }
}
