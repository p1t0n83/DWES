<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
Use Illuminate\Support\Facades\DB;
class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
     public function run(): void
    {
        $productos = [
            [
                'nombre' => 'DOOM Dark Ages',
                'precio' => 59.99,
                'descripcion' => 'Nueva entrega de la saga DOOM ambientada en la época medieval',
                'familia' => 4, // Shooter
                'stock' => 100
            ],
            [
                'nombre' => 'Elden Ring',
                'precio' => 69.99,
                'descripcion' => 'Una aventura épica en el mundo creado por George R.R. Martin y FromSoftware',
                'familia' => 3, // Souls-like
                'stock' => 150
            ],
            [
                'nombre' => 'Lies of P',
                'precio' => 59.99,
                'descripcion' => 'Una oscura interpretación de la historia de Pinocho en estilo Souls-like',
                'familia' => 3, // Souls-like
                'stock' => 80
            ],
            [
                'nombre' => 'Black Myth: Wukong',
                'precio' => 69.99,
                'descripcion' => 'Aventura basada en la mitología china y el Viaje al Oeste',
                'familia' => 1, // Acción
                'stock' => 120
            ],
            [
                'nombre' => 'Gears of War',
                'precio' => 49.99,
                'descripcion' => 'El clásico shooter de Xbox que revolucionó el género',
                'familia' => 4, // Shooter
                'stock' => 90
            ]
        ];

        DB::table('products')->insert($productos);
    }
}
