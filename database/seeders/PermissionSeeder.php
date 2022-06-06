<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = collect([
            'permissions.viewAny',
            'permissions.view',
            'permissions.create',
            'permissions.update',
            'permissions.delete',
            'roles.viewAny',
            'roles.view',
            'roles.create',
            'roles.update',
            'roles.delete',
            'users.viewAny',
            'users.view',
            'users.create',
            'users.update',
            'users.delete',
            'users.restore',
            'users.forceDelete',
        ]);

        $permissions->map(function ($permission) {
            Permission::findOrCreate($permission);
        });
    }
}
