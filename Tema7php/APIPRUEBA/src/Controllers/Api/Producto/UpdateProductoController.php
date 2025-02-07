<?php 
declare(strict_types = 1);

namespace App\Controllers\Api\Producto;

use App\Entities\Producto;
use App\Responses\JsonResponse;

final class UpdateProductoController
{
    public function __invoke(int $id): void
    {
        $producto = new Producto();
        $success = $producto->update(
            id: $id,
            data: input()->all()
        );

        JsonResponse::response(
            data: ['success' => $success]
        );
    }
}
