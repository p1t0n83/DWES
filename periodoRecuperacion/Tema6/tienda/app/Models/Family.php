<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    public $table = 'families';
    protected $fillable = ['nombre'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
