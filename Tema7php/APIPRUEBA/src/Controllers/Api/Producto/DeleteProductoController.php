<?php 
declare(strict_types = 1);

namespace App\Controllers\Api\Producto;

use App\Entities\Producto;
use App\Responses\JsonResponse;

final class DeleteProductoController
{
    public function __invoke(int $id): void
    {
        $producto = new Producto();
        $success = $producto->delete(id: $id);

        JsonResponse::response(
            data: ['success' => $success]
        );
    }
}