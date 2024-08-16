<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersontitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $titles = [
                [  'id' => '1', 'title' => 'Doctor' ],
                [  'id' => '2', 'title' => 'Madam' ],
                [  'id' => '3', 'title' => 'Miss' ],
                [  'id' => '4', 'title' => 'Mister' ],
                [  'id' => '5', 'title' => 'Professor' ],
        ];

        DB::table('person_titles')->insert($titles);
    }
}
