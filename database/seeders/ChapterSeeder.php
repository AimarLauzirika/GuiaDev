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
            'id' => 1,
            'name' => 'Eloquent',
            'subject_id' => 1,
            'position' => 1,
        ]);
        DB::table('chapters')->insert([
            'id' => 2,
            'name' => 'Instalación',
            'subject_id' => 1,
            'position' => 2
        ]);
        DB::table('chapters')->insert([
            'id' => 3,
            'name' => 'Modelos',
            'subject_id' => 1,
            'position' => 4
        ]);
        DB::table('chapters')->insert([
            'id' => 4,
            'name' => 'Controladores',
            'subject_id' => 1,
            'position' => 3
        ]);
        DB::table('chapters')->insert([
            'id' => 5,
            'name' => 'Rutas',
            'subject_id' => 1,
            'position' => 5
        ]);
        DB::table('chapters')->insert([
            'id' => 6,
            'name' => 'Middleware',
            'subject_id' => 1,
            'position' => 6,
        ]);
        
        DB::table('chapters')->insert([
            'id' => 7,
            'name' => 'Configuración',
            'subject_id' => 3,
            'position' => 2,
        ]);
        DB::table('chapters')->insert([
            'id' => 8,
            'name' => 'Ramas',
            'subject_id' => 3,
            'position' => 1,
        ]);
    }
}
