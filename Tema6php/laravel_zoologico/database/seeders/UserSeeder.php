<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $u=new User();
        $u->name="iker";
        $u->email="iker@gmail.com";
        $u->password=bcrypt("iker");
        $u->save();
    }
}
