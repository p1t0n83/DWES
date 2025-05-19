<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class FamilysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run(): void
    {
        $generos = [
            ['nombre' => 'Acción'],
            ['nombre' => 'RPG'],
            ['nombre' => 'Souls-like'],
            ['nombre' => 'Shooter'],
            ['nombre' => 'Hack and Slash']
        ];

        DB::table('familys')->insert($generos);
    }
}
