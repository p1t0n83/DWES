<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Models\Revision;
class Animal extends Model
{
    protected $table = "animales";

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getEdad()
    {
        $fechaFormateada = Carbon::parse($this->fechaNacimiento);
        return (int) $fechaFormateada->diffInYears(Carbon::now());
    }

    public function revisiones(){
        return $this->hasMany(Revision::class);
    }
}
