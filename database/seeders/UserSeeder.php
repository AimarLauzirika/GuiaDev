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
            'username' => 'Admin',
            // 'email' => 'admin@guiadev.com',
            'role_id' => 1,
            'password' => Hash::make('DevAdm'),
        ]);
        DB::table('users')->insert([
            'username' => 'Aimar',
            // 'email' => 'aimar@guiadev.com',
            'role_id' => 2,
            'password' => Hash::make('DevDev'),
        ]);
        DB::table('users')->insert([
            'username' => 'User1',
            // 'email' => 'user1@guiadev.com',
            'role_id' => 3,
            'password' => Hash::make('DevUsr1'),
        ]);
    }
}
