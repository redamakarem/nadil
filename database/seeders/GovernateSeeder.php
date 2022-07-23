<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GovernateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('governates')->insert([
            [
                'name_en' => 'Al Asimah',
                'name_ar' => 'العاصمة',
            ],
            [
                'name_en' => 'Jahra',
                'name_ar' => 'الجهراء',
            ],
            [
                'name_en' => 'Hawalli',
                'name_ar' => 'حولي',
            ],
            [
                'name_en' => 'Farwaniyah',
                'name_ar' => 'الفروانية',
            ],
            [
                'name_en' => 'Mubaral Al Kabeer',
                'name_ar' => 'مبارك الكبير',
            ],
            [
                'name_en' => 'Ahmadi',
                'name_ar' => 'الاحمدي',
            ],
        ]);
    }
}
