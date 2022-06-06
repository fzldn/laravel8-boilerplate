<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = collect([
            'Super Admin',
        ]);

        $roles->map(function ($role) {
            Role::findOrCreate($role);
        });
    }
}
