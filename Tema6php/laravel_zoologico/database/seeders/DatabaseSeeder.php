<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        DB::table('users')->delete();
        User::factory(5)->create();
        $this->call(UserSeeder::class);


        DB::table('animales')->delete();
        $this->call(AnimalSeeder::class);

        DB::table('animales_revisiones')->delete();
        $this->call(RevisionesSeeder::class);
    }
}
