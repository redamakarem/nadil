<?php

namespace Database\Seeders;

use App\Models\MealType;
use Illuminate\Database\Seeder;

class MealTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $meal_types= [
            [
                'name_en' =>'Breakfast',
                'name_ar' =>'فطور',
            ],
            [
                'name_en' =>'Lunch',
                'name_ar' =>'الغداء',
            ],
            [
                'name_en' =>'Dinner',
                'name_ar' =>'العشاء',
            ],
        ];
        MealType::insert($meal_types);
    }
}
