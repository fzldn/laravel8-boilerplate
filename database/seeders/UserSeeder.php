<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = collect([
            [
                'name' => 'Super Admin',
                'email' => 'superadmin@laravel.test',
                'roles' => ['Super Admin'],
            ],
        ]);

        $users
            ->mapInto(Collection::class)
            ->map(function ($data) {
                if (User::where('email', $data->get('email'))->doesntExist()) {
                    $user = User::factory()->create($data->except('roles')->all());

                    collect($data->get('roles', []))->map(function ($role) use ($user) {
                        $user->assignRole($role);
                    });
                }
            });
    }
}
