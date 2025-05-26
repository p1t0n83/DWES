<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FamiliaSeeder extends Seeder
{
    private $familias = [
        ['codigo' => 'BBDD', 'nombre' => 'Bases de datos'],
        ['codigo' => 'Seguridad', 'nombre' =>'Seguridad informática'],
        ['codigo' => 'Programacion', 'nombre' => 'Programación y desarrollo del software'],
        ['codigo' => 'Redes', 'nombre' => 'Redes y administración de sistemas'],
        ['codigo' => 'Sistemas', 'nombre' => 'Sistemas operativos'],
        ['codigo' => 'Otros', 'nombre' => 'Otros']
    ];

    public function run(): void
    {
        foreach ($this->familias as $familia) {
            DB::table('familias')->insert($familia);
        }
    }
}