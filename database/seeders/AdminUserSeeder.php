<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin_user = User::create([
            'name' => 'Admin',
            'email' => 'admin@nadil.com',
            'password' => Hash::make('malinki123')
        ]);
        $admin_role=Role::findById(1);
        $admin_user->assignRole($admin_role);
    }
}
