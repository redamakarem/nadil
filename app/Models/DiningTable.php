<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiningTable extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'capacity',
        'restaurant_id',
    ];


    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function bookings()
    {
        return $this->belongsToMany(Booking::class,'bookings_tables','table_id','booking_id');
    }
}
