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
    public function run()
    {
        DB::table('animales')->delete();
        $this->call(AnimalSeeder::class);


            DB::table('users')->delete();
            $this->call(UserSeeder::class);
            \App\Models\User::factory(5)->create();


    }
}
