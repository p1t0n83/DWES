<?php 
declare(strict_types = 1);

namespace App\Controllers\Api\Producto;

use App\Entities\Producto;
use App\Responses\JsonResponse;


final class GetProductosController
{
    public function __invoke(): void
    {
        $producto = new Producto();
        JsonResponse::response(
            data: $producto->get()
        );
    }
}
