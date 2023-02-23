<?php

namespace App\Http\Livewire\Site\User;

use random;
use App\Models\User;
use App\Models\Profile;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Events\UserRegistered;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

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
            'profile.phone' =>['required','numeric'],
            

        ];
    }

    public function register()
    {
        $this->validate();
        DB::transaction(function () {
            $new_user = User::create([
                'name' => $this->profile->name,
                'email' => $this->profile->email,
                'password' => Str::random(12)
            ]);
            $this->profile->user_id = $new_user->id;
            $this->profile->gender = 1;
            $new_user->assignRole('user');
            $new_user->save();
            $this->profile->save();
            $this->perform_password_reset();
            event(new UserRegistered($new_user));
            $new_user->update(['password' => Hash::make($new_user->password)]);
            $this->resetFields();
            session()->flash('success','Check your email to set your password');
        });


//        $this->reset();

    }

    private function resetFields()
    {
        $this->user = new User();
        $this->profile = new Profile();
    }

    public function render()
    {
        return view('livewire.site.user.register');
    }

    private function perform_password_reset()
    {
        $status = Password::sendResetLink(
            ['email' => $this->profile->email]
        );
     
        return $status === Password::RESET_LINK_SENT
                    ? back()->with(['status' => __($status)])
                    : back()->withErrors(['email' => __($status)]);
    }

}
