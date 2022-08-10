<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Database\Seeders\MealTypeSeeder;
use Database\Seeders\GovernateSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        $this->call([
            RoleSeeder::class,
            AdminUserSeeder::class,
            // UserSeeder::class,
            // RoleUserSeeder::class,
            // RestaurantSeeder::class,
            CuisineSeeder::class,
            PermissionSeeder::class,
            GovernateSeeder::class,
            MealTypeSeeder::class
        ]);
        // \App\Models\User::factory(10)->create();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
