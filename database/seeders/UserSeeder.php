<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Administrador',
            'email' => 'admin@admin.com',
            'role_id' => 1,
            'password' => Hash::make('admin'),
        ]);
        DB::table('users')->insert([
            'name' => 'User1',
            'email' => 'user1@user1.com',
            'role_id' => 3,
            'password' => Hash::make('user1'),
        ]);
    }
}
