<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $fillable = [
        'especie',
        'peso',
        'altura',
        'fechaNacimiento',
        'alimentacion',
        'descripcion',
        'imagen',
    ];

}
