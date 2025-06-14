<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\User;
class UserSeeder extends Seeder
{
    
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         
            User::create(['email'=>"rompeolas93@gmail.com",'name'=>"piton",'password'=>"Laparca2424"]);
         }
}
