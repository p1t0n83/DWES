<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Iker Garcia Iturri',
            'email' => 'igarciai02@educantabria.es',
            'password'=>password_hash('usuario@1',PASSWORD_BCRYPT)
        ]);
    }
}
