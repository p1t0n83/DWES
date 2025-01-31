<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Revision extends Model
{
    protected $table = 'animales_revisiones';
    public $timestamps = false;

    protected $fillable = [
        'fecha',
        'descripcion',
        'animalid', // Aquí usas el animalid para vincular la revisión con un animal
    ];
}
