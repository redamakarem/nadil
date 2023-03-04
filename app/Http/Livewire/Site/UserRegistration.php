<?php

namespace App\Http\Livewire\Site;

use App\Models\User;
use App\Mail\TestMail;
use App\Models\Profile;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Events\UserRegistered;
use App\Mail\UserRegisteredMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use App\Mail\UserRegistered as MailUserRegistered;

class UserRegistration extends Component
{
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
                'password' => $this->password
            ]);
            $this->profile->user_id = $new_user->id;
            $this->profile->dob = $this->date_of_birth;
            $new_user->assignRole('user');
            $new_user->save();
            $this->profile->save();
            // $this->perform_password_reset();
            event(new UserRegistered($new_user));
            // $new_user->update(['password' => Hash::make($new_user->password)]);
            $this->resetFields();
            // session()->flash('success','Check your email to set your password');
        });

    }

    public function render()
    {
        return view('livewire.site.user-registration');
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

    private function resetFields()
    {
        // $this->user = new User();
        $this->profile = new Profile();
        $this->password = '';
        $this->password_confirmation = '';
    }

}
