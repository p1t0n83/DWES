<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
USE Carbon\Carbon;
class RevisionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $primerAnimal = DB::table('animales')->orderBy('id', 'asc')->first();

        // Insertar revisiones solo para el primer animal
        DB::table('animales_revisiones')->insert([
            [
                'fecha' => Carbon::now()->subDays(rand(1, 30)), // Fecha aleatoria en el último mes
                'descripcion' => 'Revisión general del animal.',
                'animalId' => $primerAnimal->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fecha' => Carbon::now()->subDays(rand(1, 30)),
                'descripcion' => 'Chequeo de vacunación.',
                'animalId' => $primerAnimal->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        $this->command->info('Seeder de animales_revisiones ejecutado correctamente para el primer animal.');
    }
    }

