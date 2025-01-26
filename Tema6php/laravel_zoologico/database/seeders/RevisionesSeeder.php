<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Animal;
use App\Models\Revision;

class RevisionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $primerAnimal = Animal::first();

        if ($primerAnimal) {
            Revision::create([
                'fecha' => now(),
                'descripcion' => 'Revisión general',
                'animal_id' => $primerAnimal->id,
            ]);

            Revision::create([
                'fecha' => now()->subDays(10),
                'descripcion' => 'Revisión dental',
                'animal_id' => $primerAnimal->id,
            ]);
        }
    }
}