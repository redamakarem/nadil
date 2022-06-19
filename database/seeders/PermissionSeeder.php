<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        Permission::truncate();
        $permissions_seed_data = [
            ['name' =>'Create Restaurant', 'guard_name'=>'web'],
            ['name' =>'Edit Restaurant', 'guard_name'=>'web'],
            ['name' =>'Delete Restaurant', 'guard_name'=>'web'],
            ['name' =>'Create Menu', 'guard_name'=>'web'],
            ['name' =>'Edit Menu', 'guard_name'=>'web'],
            ['name' =>'Delete Menu', 'guard_name'=>'web'],
            ['name' =>'Create Dish', 'guard_name'=>'web'],
            ['name' =>'Edit Dish', 'guard_name'=>'web'],
            ['name' =>'Delete Dish', 'guard_name'=>'web'],
            ['name' =>'Create Restaurant User', 'guard_name'=>'web'],
            ['name' =>'Edit Restaurant User', 'guard_name'=>'web'],
            ['name' =>'Delete Restaurant User', 'guard_name'=>'web'],

        ];

        Permission::insert($permissions_seed_data);
    }
}
