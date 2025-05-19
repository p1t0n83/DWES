<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    public function imagenes(){
    return $this->hasMany(Image::class);
  }
}
