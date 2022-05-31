<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            AdminUserSeeder::class,
            UserSeeder::class,
            RoleUserSeeder::class,
            RestaurantSeeder::class,
            CuisineSeeder::class,
            PermissionSeeder::class
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
