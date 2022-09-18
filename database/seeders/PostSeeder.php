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
            'content' => '<h1 class="text-xl text-orange-800 font-bold bg-red-50 px-1">1. Encabezado</h1><p>Un poco de contenido.</p><pre><code class="language-php">Route::get("/dashboard", UserPostsIndex::class)-&gt;middleware("auth")-&gt;name("dashboard");</code></pre>',
            'user_id' => 1,
            'subject_id' => 1,
            'finished' => 0,
        ]);
        DB::table('posts')->insert([
            'title' => 'Gestionar rutas en Laravel',
            'description' => 'Cómo crear rutas, asignar controladores y métodos a las rutas, nombres...',
            'user_id' => 1,
            'subject_id' => 1,
            'chapter_id' => 5,
        ]);
        DB::table('posts')->insert([
            'title' => 'Añadir middleware a las rutas en Laravel',
            'description' => '¿Cómo agregar middleware a las rutas? ¿Cuál es la mejor manera de añadir middleware a las rutas de Laravel?',
            'user_id' => 2,
            'subject_id' => 1,
            'chapter_id' => 6,
        ]);
        DB::table('posts')->insert([
            'title' => 'Configurar nombre y email en Git',
            'description' => 'Gestiona la configuración básica de git para cambiar el nombre y el email del usuario.',
            'user_id' => 1,
            'subject_id' => 3,
            'chapter_id' => 8,
            'finished' => 0,
            'public' => 1,
        ]);
        
        DB::table('posts')->insert([
            'title' => 'Crear ramas en Git (Branches)',
            'description' => 'Git branch, git switch -c, checkout -b y git switch --orphan',
            'user_id' => 2,
            'subject_id' => 3,
            'chapter_id' => 9,
            'public' => 1,
        ]);
        DB::table('posts')->insert([
            'title' => 'Cómo hacer que un campo sea único en relación a otro u otros campos',
            'description' => 'Crear migraciones y validaciones de un campo único en relación a otro campo u otros campos. [unique, migración, validación]',
            'content' => '$table->unique(["title", "subject_id"])',
            'user_id' => 1,
            'subject_id' => 1,
            'chapter_id' => 7,
            'public' => 1,
            'finished' => 0,
        ]);
        DB::table('posts')->insert([
            'title' => 'Cómo validar un campo nulable y único a la vez',
            'description' => 'Validación de un campo nulable, pero cuando tiene contenido, no se pueda repetir. [nullable, unique, único]',
            'content' => '"teléfono" => "sometimes|unique:users"',
            'user_id' => 1,
            'subject_id' => 1,
            'chapter_id' => 7,
            'public' => 0,
            'finished' => 0,
        ]);
        DB::table('posts')->insert([
            'title' => 'Actualizar un registro y mantener los campos únicos igual',
            'description' => 'Cómo actualizar un registro, manteniendo igual un campo único y que no de error de que ese campo ya existe. [ignore, unique, validación]',
            'content' => '[
                "email" => [
                "required",
                Rule::unique("users")->ignore($user->id),
                ] o unique:table,column,except,idColumn',
            'user_id' => 2,
            'subject_id' => 1,
            'chapter_id' => 7,
        ]);
    }
}
