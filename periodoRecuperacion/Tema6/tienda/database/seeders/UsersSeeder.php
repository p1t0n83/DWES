<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usuarios = [
            [
                'name' => 'Administrador',
                'email' => 'admin@tiendagames.com',
                'password' => Hash::make('admin1234'),
                'rol' => 'admin',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Cliente Demo',
                'email' => 'cliente@gmail.com',
                'password' => Hash::make('cliente1234'),
                'rol' => 'cliente',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Ana García',
                'email' => 'ana@gmail.com',
                'password' => Hash::make('ana1234'),
                'rol' => 'cliente',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Super Admin',
                'email' => 'super@tiendagames.com',
                'password' => Hash::make('super1234'),
                'rol' => 'admin',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        DB::table('users')->insert($usuarios);
    }
}
