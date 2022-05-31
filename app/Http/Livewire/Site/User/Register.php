<?php

namespace App\Http\Livewire\Site\User;

use App\Events\UserRegistered;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Register extends Component
{

    public User $user;

    public Profile $profile;
    public $password;
    public $password_confirmation;
    public $date_of_birth;
    public function mount(Profile $profile)
    {
        $this->profile = new Profile();
        $this->date_of_birth = '';
    }

    protected function rules()
    {
        return [
            'profile.name' =>['required'],
            'profile.email' =>['required','unique:users,email','email'],
            'profile.phone' =>['required'],
            'profile.gender' =>['sometimes','integer'],
            'password' =>['required','confirmed'],
            'date_of_birth' =>['required'],

        ];
    }

    public function register()
    {
        $this->validate();
        DB::transaction(function () {
            $new_user = User::create([
                'name' => $this->profile->name,
                'email' => $this->profile->email,
                'password' => Hash::make($this->password)
            ]);
            $this->profile->dob = $this->date_of_birth;
            $this->profile->user_id = $new_user->id;
            $new_user->assignRole(Role::findById(3));
            $new_user->save();
            $this->profile->save();
            event(new UserRegistered(User::latest()->first()));
            $this->resetFields();
            session()->flash('success','Registered Successfully');
        });


//        $this->reset();

    }

    private function resetFields()
    {
        $this->reset(['password','password_confirmation','date_of_birth']);
        $this->user = new User();
        $this->profile = new Profile();
    }

    public function render()
    {
        return view('livewire.site.user.register');
    }


}
