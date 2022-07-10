<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Component;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class Edit extends Component
{
    public $user;
    public $roles;
    public $selected_role;
    public $password;
    public $password_confirmation;

    public function rules()
    {
        return [
            'user.name' => ['required'],
            'user.email' => ['required','email',Rule::unique('users','email')->ignore($this->user->id)],
            'password' => ['nullable','min:5','confirmed'],
            'selected_role' => ['required']
        ];
    }

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

    public function submit()
    {
        $this->validate();
        $this->user->save();
        $this->user->roles()->sync($this->selected_role);
    }
}
