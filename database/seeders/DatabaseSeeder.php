<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    { 
        
        User::factory(10)->create();
        $this->call(PermissionSeeder::class);
        $this->call(DefaultUser::class);
        $this->call(AssignPermissionSeeder::class);
        $this->call(ConfigSeeder::class);
        $this->call(PersontitleSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(StateSeeder::class);
    }
}
