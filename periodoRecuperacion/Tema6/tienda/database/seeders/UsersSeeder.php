<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crea usuarios y asigna roles con Spatie
        $admin = User::create([
            'name' => 'Administrador',
            'email' => 'admin@tiendagames.com',
            'password' => Hash::make('admin1234'),
        ]);
        $admin->assignRole('admin');

        $cliente = User::create([
            'name' => 'Cliente Demo',
            'email' => 'cliente@gmail.com',
            'password' => Hash::make('cliente1234'),
        ]);
        $cliente->assignRole('cliente');

        $ana = User::create([
            'name' => 'Ana García',
            'email' => 'ana@gmail.com',
            'password' => Hash::make('ana1234'),
        ]);
        $ana->assignRole('cliente');

        $super = User::create([
            'name' => 'Super Admin',
            'email' => 'super@tiendagames.com',
            'password' => Hash::make('super1234'),
        ]);
        $super->assignRole('admin');
    }
}
