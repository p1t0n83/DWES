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
        $this->call(UsersSeeder::class);

        DB::table('families')->delete();
        $this->call(FamiliesSeeder::class);

        DB::table('products')->delete();
        $this->call(ProductsSeeder::class);

        DB::table('images')->delete();
        $this->call(ImagesSeeder::class);
    }
}
