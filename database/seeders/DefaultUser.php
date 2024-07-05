<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefaultUser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // create a default user as admin and student with array of data
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('password'),
                'role' => '2',
            ],
            [
                'name' => 'Student',
                'email' => 'student@gmail.com',
                'password' => bcrypt('password'),
                'role' => '1',
            ],
        ];

        // loop through the array of data and create a new user
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
