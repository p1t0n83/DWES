<?php 
declare(strict_types = 1);

use Pecee\SimpleRouter\SimpleRouter as Router;
use App\Controllers\Api\ApiController;
use App\Controllers\Api\Producto\CreateProductoController;
use App\Controllers\Api\Producto\GetProductosController;
use App\Controllers\Api\Producto\ListProductosController;
use App\Controllers\Api\Producto\UpdateProductoController;
use App\Controllers\Api\Producto\DeleteProductoController;

Router::group(
    ['prefix' => 'api'],
    function (): void {
        Router::get('/', [ApiController::class, '__invoke']);

        Router::group(
            ['namespace' => 'Producto', 'prefix' => 'productos'],
            function (): void {
                Router::post('/', [CreateProductoController::class, '__invoke']);
                Router::get('/', [GetProductosController::class, '__invoke']);
                Router::get('/{id}', [ListProductosController::class, '__invoke']);
                Router::put('/{id}', [UpdateProductoController::class, '__invoke']);
                Router::delete('/{id}', [DeleteProductoController::class, '__invoke']);
            }
        );
    }
);
