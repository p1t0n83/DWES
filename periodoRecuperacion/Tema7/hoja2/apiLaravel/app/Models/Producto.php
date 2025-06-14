<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria;
/**
 * @OA\Schema(
 *  schema="Producto",
 *  type="object",
 *  title="Producto",
 *  @OA\Property(property="id", type="integer", example="1"),
 *  @OA\Property(property="nombre", type="string", example="Producto 1"),
 *  @OA\Property(property="descripcion", type="string", example="descripcion del primer producto"),
 *  @OA\Property(property="precio", type="decimal", example="10.56"),
 *  @OA\Property(property="stock", type="integer", example="1"),
 *  @OA\Property(property="categoria", ref="#/components/schemas/Categoria")
 *  )
 */
class Producto extends Model
{
    protected $table = 'productos';
    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'stock',
        'categoria_id',
        'imagen_id'
    ];
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function imagen()
    {
        return $this->belongsTo(Imagen::class);
    }
}
