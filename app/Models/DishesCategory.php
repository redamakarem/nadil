<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DishesCategory extends Model
{
    use HasFactory;
    protected $table = 'catalogue_categories';
    protected $fillable = ['name','catalogue_id'];

    public function dishes()
    {
        return $this->belongsToMany(Dish::class,
            'catalogue_categories_dishes',
            'catalogue_category_id','dish_id');
    }

    public function menu()
    {
        return $this->belongsTo(DishesMenu::class);
    }
}
