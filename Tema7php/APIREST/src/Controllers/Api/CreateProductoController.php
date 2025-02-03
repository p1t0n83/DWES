<?php
declare(strict_types = 1);

namespace App\Controllers\Api;

use App\Entities\Producto;
use App\Responses\JsonResponse;

final class CreateProductoController
{
    public function __invoke(): void
    {
        $producto = new Producto();
        $productoId = $producto->create(
            data:input()->all(),
        );

        JsonResponse::response(
            data:$producto->find(productoId:(int) $productoId)
        );
    }
}
