<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revision extends Model
{
    use HasFactory;

    protected $table = "revisiones";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fecha',
        'descripcion',
        'animal_id',
    ];

    /**
     * Get the animal that owns the revision.
     */
    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }
}