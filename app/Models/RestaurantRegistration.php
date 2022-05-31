<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurantRegistration extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'owner_name',
        'num_locations',
        'email',
        'phone',
        'social_media',
    ];
}
