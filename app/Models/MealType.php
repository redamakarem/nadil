<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Restaurant;

class MealType extends Model
{
    use HasFactory;

    protected $fillable = ['name_en','name_ar'];

    public function restaurants()
    {
        return $this->belongsToMany(Restaurant::class)->publishable();
    }
}
