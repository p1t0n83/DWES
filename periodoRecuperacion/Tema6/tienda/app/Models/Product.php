<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['nombre', 'slug', 'precio', 'stock', 'descripcion', 'familia'];


    public function getRouteKeyName()
    {
        return 'slug';
    }

    

    public function imagenes()
    {
        return $this->hasMany(Image::class, 'producto');
    }
}
