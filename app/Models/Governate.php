<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Governate extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_en',
        'name_ar',
    ];


    public function areas()
    {
        return $this->hasMany(Area::class);
    }
}
