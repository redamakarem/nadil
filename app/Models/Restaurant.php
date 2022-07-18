<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Dish;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        'facebook',
        'instagram',
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

    public function scopeActive(Builder $query)
    {
        return $query->where('is_active',1);
    }

    public function scopeSlotBookable(Builder $query)
    {
        $this->dd('YAAS');
        return $query;
    }

    public function scopeHasScheduleForDate(Builder $query, $date)
    {
        $query->whereHas('schedules',function(Builder $q)use($date){
            $q->where('from_date','<',$date)
            ->where('to_date','>',$date);
        });
    }
    
    public function scopeByCuisine(Builder $query, $cuisine)
    {
        $query->whereHas('cuisines',function($q)use($cuisine){
            return $q->where('id',$cuisine);
        });
    }
}
