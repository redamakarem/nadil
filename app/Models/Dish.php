<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;


class Dish extends Model implements HasMedia
{
    use InteractsWithMedia;

    use HasFactory;

    protected $fillable = [
        'name_en',
        'name_ar',
        'description_en',
        'description_ar',
        'price',
        'prep_time',
        'restaurant_id',
        'menu_id',
        'cuisine_id',
        'is_featured',
        'isActive',
    ];


    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function cuisine()
    {
        return $this->belongsTo(Cuisine::class);
    }

    public function menu()
    {
        return $this->belongsTo(DishesMenu::class);
    }

    public function categories()
    {
        return $this->belongsToMany(DishesCategory::class,'catalogue_categories_dishes','dish_id','catalogue_category_id');
    }
}
