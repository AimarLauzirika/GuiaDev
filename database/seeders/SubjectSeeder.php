<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subjects')->insert([
            'name' => 'Laravel',
            'color' => '#F9322C',
            'user_id' => 1
        ]);
        DB::table('subjects')->insert([
            'name' => 'PHP',
            'color' => '#7A86B8',
            'user_id' => 1
        ]);
        DB::table('subjects')->insert([
            'name' => 'Git & GitHub',
            'color' => '#24293E',
            'user_id' => 1
        ]);
        DB::table('subjects')->insert([
            'name' => 'Vue 3',
            'color' => '#3FB983',
            'user_id' => 1
        ]);
    }
}
