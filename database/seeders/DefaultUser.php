<?php

namespace Database\Seeders;

use App\Models\User;
use App\Services\EncryptionService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DefaultUser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User Role
        $userRole = Role::firstOrcreate(
            ['name' => 'user'],

        [
            'name' => 'user',
            'guard_name' => 'web',
        ]);

        $userUsers = [
            [
                'name' => 'User',
                'email' => 'user@gmail.com',
                'password' => Hash::make('password'),
                'role' => '1',
                'is_confirmed' => true
            ]
        ];

        // loop through the array of data and create a new user
        foreach ($userUsers as $user) {
            $user = User::firstOrCreate(['email' => EncryptionService::encrypt($user['email'])], $user);
            $user = User::where('email', EncryptionService::encrypt($user['email']))->first();
            $user->assignRole($userRole);
        }


        //admin Role
        $adminRole = Role::firstOrcreate(
        ['name' => 'admin'],
        [
            'name' => 'admin',
            'guard_name' => 'web',
        ]);

        $adminUsers = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password'),
                'role' => '2',
                'is_confirmed' => true
            ],
        ];

        // loop through the array of data and create a new user
        foreach ($adminUsers as $user) {
            $user = User::firstOrCreate(['email'=> EncryptionService::encrypt($user['email'])], $user);
            $user = User::where('email', EncryptionService::encrypt($user['email']))->first();
            $user->assignRole($adminRole);
        }
    }
}
