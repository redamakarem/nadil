<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::where('id','>',1)->get();
        $users->each(function ($user){
            $user->assignRole(Role::where('id','>',1)->get()->random(1));
        });
    }
}
