<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use App\Models\Dish;

class Restaurant extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    protected $fillable = [
        'name_en',
        'name_ar',
        'email',
        'address',
        'coordinates',
        'image',
        'phone',
        'user_id',
        'is_active',
        'estimated_dining_time',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function staff()
    {
        return $this->hasMany(User::class);
    }

    public function cuisines()
    {
        return $this->belongsToMany(Cuisine::class);
    }

    public function menus()
    {
        return $this->hasMany(DishesMenu::class,'restaurant_id','id');
    }

    public function dishes()
    {
        return $this->hasMany(Dish::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class,'restaurant_id','id');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function diningTables()
    {
        return $this->hasMany(DiningTable::class);
    }


    public function reserved_tables()
    {
        return $this->hasMany(BookingsTables::class);
    }

    public function meal_types()
    {
        return $this->belongsToMany(MealType::class);
    }
}
