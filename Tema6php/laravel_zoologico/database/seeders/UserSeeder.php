<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    private $usuarios = array(
        array(
          'name'=>'iker',
        'email'=>'iker@gmail.com',
        'password'=>'iker', )
    );

    public function run(): void
    {
         foreach ($this->usuarios as $usuario) {
            $a = new User();
            $a->name = $usuario['name'];
            $a->email = $usuario['email'];
            $a->password =bcrypt($usuario['password']);
            $a->save();
        }
        $this->command->info('Tabla animales inicializada con datos');
    }
}
