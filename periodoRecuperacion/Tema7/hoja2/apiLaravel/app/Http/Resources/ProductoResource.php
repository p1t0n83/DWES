<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
   public function toArray($request)
{
    return [
        'id' => $this->id,
        'nombre' => $this->nombre,
        'precio' => $this->precio,
        'descripcion' => $this->descripcion,
        'categoria' => $this->categoria->nombre,
        'imagen_url' => $this->imagen ? url('imagenes/' . $this->imagen->nombre) : null,
        'nombre_imagen' => $this->imagen ? $this->imagen->nombre : null,
    ];
}
}
