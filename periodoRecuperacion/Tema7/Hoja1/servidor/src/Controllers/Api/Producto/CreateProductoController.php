<?php
declare(strict_types=1);

namespace App\Controllers\Api\Producto;

use App\Entities\Producto;
use App\Responses\JsonResponse;
use App\Request\ProductoRequest;

final class CreateProductoController
{
    public function __invoke(): void
    {
        $producto = new Producto();
        $request = new ProductoRequest();
        $datosValidados = $request->validated(); // Solo nombre, descripcion, precio
        
        // Agregar imagen desde $_FILES
        if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
            $nombreImagen = $_FILES['imagen']['name']; // El nombre único del cliente
            $datosValidados['imagen'] = $nombreImagen;
            
            // Mover archivo
            move_uploaded_file($_FILES['imagen']['tmp_name'], dirname(__DIR__, 4) . '/public/img/' . $nombreImagen);
        }

        $productoId = $producto->create(data: $datosValidados);

        JsonResponse::response(
            data: $producto->find(id: (int) $productoId)
        );
    }
}