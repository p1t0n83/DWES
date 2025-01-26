<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class RevisionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $primerAnimal = DB::table('animales')->first();

        if ($primerAnimal) {
            DB::table('revisiones')->insert([
                [
                    'fecha' => Carbon::now(),
                    'descripcion' => 'Revisión general',
                    'animal_id' => $primerAnimal->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'fecha' => Carbon::now()->subDays(10),
                    'descripcion' => 'Revisión dental',
                    'animal_id' => $primerAnimal->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
            ]);
        }
    }
}