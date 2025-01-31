<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Animal extends Model
{
    protected $table = 'animales';
    protected $fillable = [
        'id', // Aunque normalmente no es necesario para el id
        'especie',
        'peso',
        'altura',
        'fechaNacimiento',
        'alimentacion',
        'descripcion',
        'imagen', // Asegúrate de incluir todos los campos que sean asignables
    ];

    public static function getIdByEspecie($especie)
    {
        // Buscar el animal por la especie
        $animal = self::where('especie', $especie)->first();

        // Retornar el id si se encontró el animal
        return $animal ? $animal->id : null;
    }
        public $timestamps = false;

    public function getEdad()
{
$fechaFormateada=Carbon::parse($this->fechaNacimiento);
return $fechaFormateada->diffInYears(Carbon::now());
}

public function revisiones(){
    return $this->hasmany(Revision::class,'animalid');
}
}
