<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingsTables extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'table_id',
        'booking_date',
        'booking_time',
        'restaurant_id',
        'booking_end_time',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
    public function table()
    {
        return $this->hasOne(DiningTable::class);
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
