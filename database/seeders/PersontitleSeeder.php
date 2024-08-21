<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\PersonTitle;

class PersontitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // PersonTitle::truncate();
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
