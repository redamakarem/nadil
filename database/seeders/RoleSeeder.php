<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('model_has_roles')->truncate();
        Role::truncate();
        Role::create(['name' => 'super-admin']);
        Role::create(['name' => 'nadil-admin']);
        Role::create(['name' => 'nadil-support']);
        Role::create(['name' => 'restaurant-super-admin']);
        Role::create(['name' => 'restaurant-admin']);
        Role::create(['name' => 'restaurant-host']);
        Role::create(['name' => 'restaurant-manager']);
        Role::create(['name' => 'user']);

    }
}
