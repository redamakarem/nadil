<?php

namespace App\Http\Livewire\Admin\Users;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Edit extends Component
{
    public $user;
    public $roles;
    public $selected_role;
    public $password;
    public $password_confirmation;

    protected $rules = [
        'user.name' => ['required'],
        'user.email' => ['required','unique:users,email'],
        'password' => ['required','min:5','confirmed'],
        'selected_role' => ['required']
    ];

    public function mount($user)
    {
        $this->user = $user;
        $this->roles = Role::all();
        $this->selected_role = $this->user->roles->first()->id;
    }
    public function render()
    {
        return view('livewire.admin.users.edit');
    }
}
