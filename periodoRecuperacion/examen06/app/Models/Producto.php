<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    public $fillable=[
         "titulo",
         "slug",
         "precio",
         "familia_id",
         "imagen_id",
         "descipcion"
    ];
    public function getRouteKeyName(){
        return 'slug';
    }
    public function imagen()
    {
        return $this->belongsTo(Imagene::class, 'imagen_id');
    }

    public function familia()
    {
        return $this->belongsTo(Familia::class, 'familia_id');
    }
}
