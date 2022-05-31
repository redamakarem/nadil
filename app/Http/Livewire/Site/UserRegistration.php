<?php

namespace App\Http\Livewire\Site;

use App\Events\UserRegistered;
use App\Mail\UserRegisteredMail;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

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
        try {
            DB::transaction(function () {
                $new_user = User::create([
                    'name' => $this->profile->name,
                    'email' => $this->profile->email,
                    'password' => Hash::make($this->password)
                ]);
                $this->profile->dob = $this->date_of_birth;
                $this->profile->user_id = $new_user->id;
                $this->profile->save();

            });
            dd(User::latest()->first());
            Mail::to(User::latest()->first()->email)->send(new UserRegisteredMail(User::latest()->first()));
        } catch (\Throwable $e) {
            dd($e);
        }


//        $this->reset();

    }

    public function render()
    {
        return view('livewire.site.user-registration');
    }

}
