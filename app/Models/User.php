<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Lab404\Impersonate\Models\Impersonate;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, Impersonate;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'mobile',
        'landline',
        'social_id',
        'social_type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function restaurants()
    {
        return $this->hasMany(Restaurant::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function workplace()
    {
        return $this->belongsTo(Restaurant::class,'restaurant_id');
    }

    public function getInitialsAttribute(): string
    {
        return \Illuminate\Support\Str::initials($this->name);
    }

    public function sendPasswordResetNotification($token){
        // $this->notify(new MyCustomResetPasswordNotification($token)); <--- remove this, use Mail instead like below
    
        $data = [
            $this->email
            
        ];
    
        Mail::send('mail.reset-password', [
            'name'      => $this->name,
            'password'      => $this->password,
            'reset_url'     => route('password.reset', ['token' => $token]),
        ], function($message) use($data){
            $message->subject('Reset Password Request');
            $message->to($data[0]);
        });
    }
}
