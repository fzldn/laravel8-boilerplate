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
        $permissions = [
            [
                'name' => 'roles.viewAny',
                'guard_name' => 'web',
                'description' => __('Manage roles'),
            ],
            [
                'name' => 'roles.view',
                'guard_name' => 'web',
                'description' => __('View role'),
            ],
            [
                'name' => 'roles.create',
                'guard_name' => 'web',
                'description' => __('Create role'),
            ],
            [
                'name' => 'roles.update',
                'guard_name' => 'web',
                'description' => __('Edit role'),
            ],
            [
                'name' => 'roles.delete',
                'guard_name' => 'web',
                'description' => __('Delete role'),
            ],
            [
                'name' => 'users.viewAny',
                'guard_name' => 'web',
                'description' => __('Manage users'),
            ],
            [
                'name' => 'users.view',
                'guard_name' => 'web',
                'description' => __('View user'),
            ],
            [
                'name' => 'users.create',
                'guard_name' => 'web',
                'description' => __('Create user'),
            ],
            [
                'name' => 'users.update',
                'guard_name' => 'web',
                'description' => __('Edit user'),
            ],
            [
                'name' => 'users.delete',
                'guard_name' => 'web',
                'description' => __('Delete user'),
            ],
            [
                'name' => 'users.restore',
                'guard_name' => 'web',
                'description' => __('Restore user'),
            ],
            [
                'name' => 'users.forceDelete',
                'guard_name' => 'web',
                'description' => __('Delete user permanently'),
            ],
        ];

        Permission::upsert($permissions, ['name', 'guard_name'], ['description']);
    }
}
