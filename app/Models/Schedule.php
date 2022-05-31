<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slot_length',
        'from_date',
        'to_date',
        'from_time',
        'to_time',
        'restaurant_id',
    ];
}
