<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class FamiliaSeeder extends Seeder
{

    private $familias = [
            ['codigo' => 'BBDD', 'descripcion' => 'Bases de datos'],
            ['codigo' => 'Seguridad', 'descripcion' =>'Seguridad informática'],
            ['codigo' => 'Programacion', 'descripcion' => 'Programación y desarrollo del software'],
            ['codigo' => 'Redes', 'descripcion' => 'Redes y administración de sistemas'],
            ['codigo' => 'Sistemas', 'descripcion' => 'Sistemas operativos'],
            ['codigo' => 'Otros', 'descripcion' => 'Otros']
        ];


    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('familias')->insert($this->familias);

    }
}
