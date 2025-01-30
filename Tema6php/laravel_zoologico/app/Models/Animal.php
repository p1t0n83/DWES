<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Animal extends Model
{
    protected $table = 'animales';
    public $timestamps = false;

    public function getEdad()
{
$fechaFormateada=Carbon::parse($this->fechaNacimiento);
return $fechaFormateada->diffInYears(Carbon::now());
}
}
