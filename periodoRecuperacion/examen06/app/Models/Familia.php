<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Familia extends Model
{
    public $fillable=[
        "id",
        "codigo",
        "descripcion"
    ];
}
