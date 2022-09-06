<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'title' => 'Crear una migración en Laravel',
            'description' => 'Cómo crear una migración, tipos de columnas, etc.',
            'user_id' => 1,
            'subject_id' => 1,
        ]);
        DB::table('posts')->insert([
            'title' => 'Gestionar rutas en Laravel',
            'description' => 'Cómo crear rutas, asignar controladores y métodos a las rutas, nombres...',
            'user_id' => 1,
            'subject_id' => 1,
            'chapter_id' => 6,
        ]);
    }
}
