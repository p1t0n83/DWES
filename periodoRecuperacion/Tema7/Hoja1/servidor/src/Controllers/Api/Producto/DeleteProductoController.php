<?php
declare(strict_types=1);

namespace App\Controllers\Api\Producto;

use App\Entities\Producto;

final class DeleteProductoController
{
    public function __invoke(int $id): void
    {
        $producto = new Producto();
        $productoEncontrado = $producto->find($id);
             
        if ($productoEncontrado && isset($productoEncontrado['imagen'])) {
            $rutaImagen = dirname(__DIR__, 4) . '/public/img/'  . $productoEncontrado['imagen'];
            if (file_exists($rutaImagen)) {
                unlink($rutaImagen); 
            }
        }
         $productoBorrado = $producto->delete($id);
        $response = response();
        if ($productoBorrado !== false && !empty($productoBorrado)) {
            // Respuesta exitosa en JSON
            $response->httpCode(200)
                ->json([
                    'status' => 'success',
                    'data' => " Se borro con exito el producto",
                ]);
        } else {
            // Respuesta error en JSON
            $response->httpCode(404)
                ->json([
                    'status' => 'error',
                    'message' => 'No se pudo tomar el producto.',
                ]);
        }
    }
}