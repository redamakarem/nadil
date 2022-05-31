<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use App\Models\Restaurant;

class Cuisine extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    protected $fillable = [
        'name_en',
        'image',
        'name_ar'
    ];

    public function restaurants()
    {
        return $this->belongsToMany(Restaurant::class);
    }
}
