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
        $datosValidados = $request->validated();

        // Agregar el nombre de imagen a los datos validados
        if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
            $nombreImagen = $_FILES['imagen']['name']; 
            $datosValidados['imagen'] = $nombreImagen;

            // Mover la imagen al servidor
            move_uploaded_file($_FILES['imagen']['tmp_name'], dirname(__DIR__, 4) . '/public/img/' . $nombreImagen);
        }

        $productoId = $producto->create(data: $datosValidados);

        JsonResponse::response(
            data: $producto->find(id: (int) $productoId)
        );
    }
}