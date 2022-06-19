<?php

namespace Database\Seeders;

use App\Models\Cuisine;
use Illuminate\Database\Seeder;

class CuisineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cuisine::create(['name_en' => 'Arabic']);
        Cuisine::create(['name_en' => 'Indian']);
        Cuisine::create(['name_en' => 'Italian']);
        Cuisine::create(['name_en' => 'American']);
        Cuisine::create(['name_en' => 'Lebanese']);
    }
}
