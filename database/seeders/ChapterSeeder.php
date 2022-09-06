<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChapterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('chapters')->insert([
            'name' => 'Eloquent',
            'subject_id' => 1,
            'position' => 1
        ]);
        DB::table('chapters')->insert([
            'name' => 'Instalación',
            'subject_id' => 1,
            'position' => 2
        ]);
        DB::table('chapters')->insert([
            'name' => 'Modelos',
            'subject_id' => 1,
            'position' => 4
        ]);
        DB::table('chapters')->insert([
            'name' => 'Controladores',
            'subject_id' => 1,
            'position' => 3
        ]);
        DB::table('chapters')->insert([
            'name' => 'Rutas',
            'subject_id' => 1,
            'position' => 5
        ]);
    }
}
