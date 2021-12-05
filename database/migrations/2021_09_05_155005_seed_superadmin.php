<?php

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;

class SeedSuperadmin extends Migration
{
    public function up()
    {
        $user = User::where('email', 'superadmin@apms.com')->first();
        $role = Role::where('name', Role::SUPERADMIN)->first();

        if (!$user) {
            $user = User::create([
                'name' => 'superadmin',
                'email' => 'superadmin@apms.com',
                'password' => bcrypt('password'),
            ]);
        }

        if (!$role) {
            $role = Role::create(['name' => Role::SUPERADMIN]);
        }

        $user->assignRole($role);
    }
}
