<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class family extends Model
{
    public function productos(){
    return $this->hasMany(Product::class);
  }
}
