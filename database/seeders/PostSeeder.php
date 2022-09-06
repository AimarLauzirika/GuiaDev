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
        DB::table('posts')->insert([
            'title' => 'Añadir middleware a las rutas en Laravel',
            'description' => '¿Cómo agregar middleware a las rutas? ¿Cuál es la mejor manera de añadir middleware a las rutas de Laravel?',
            'user_id' => 2,
            'subject_id' => 1,
            'chapter_id' => 6,
        ]);

        DB::table('posts')->insert([
            'title' => 'Manejo de Ramas en Git (Branches)',
            'description' => 'Todo lo que necesitas saber sobre las ramas en Git',
            'user_id' => 2,
            'subject_id' => 2,
            'chapter_id' => 1,
        ]);
    }
}
