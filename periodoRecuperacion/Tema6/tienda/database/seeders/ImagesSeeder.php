<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Asumiendo que tienes 5 productos y las imágenes se llaman 1.jpg, 2.jpg, etc.
        $imagenes = [
            [
                'titulo' => 'DOOM Dark Ages',
                'url' => '1.jpg',
                'producto' => 1
            ],
            [
                'titulo' => 'Elden Ring',
                'url' => '2.jpg',
                'producto' => 2
            ],
            [
                'titulo' => 'Lies of P',
                'url' => '3.jpg',
                'producto' => 3
            ],
            [
                'titulo' => 'Black Myth: Wukong',
                'url' => '4.jpg',
                'producto' => 4
            ],
            [
                'titulo' => 'Gears of War',
                'url' => '5.jpg',
                'producto' => 5
            ],
        ];

        DB::table('images')->insert($imagenes);
    }
}
