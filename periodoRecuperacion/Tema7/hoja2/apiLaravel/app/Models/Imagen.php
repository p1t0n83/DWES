<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    protected $fillable = ['nombre'];
    protected $table = 'imagenes';
   public function producto(){
    return $this->hasOne(Producto::class, 'imagen_id');
}
}
