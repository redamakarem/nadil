<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
    'name',
    'dob',
    'email',
    'phone',
    'gender',
    'user_id',
    ];

    public function user()
    {
        $this->belongsTo(User::class);
    }

    public function getInitialsAttribute(): string
    {
        return \Illuminate\Support\Str::initials($this->name);
    }
}
