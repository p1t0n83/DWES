<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [
        'nombre_imagen',
        'titulo',
        'slug',
        'descripcion',
        'precio',
        'familia',
    ];

    // Usar 'slug' como clave primaria para las rutas
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
