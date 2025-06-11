<?php
declare(strict_types=1);

namespace App\Controllers\Api\Producto;

use App\Entities\Producto;
use App\Request\ProductoRequest;

final class UpdateProductoController
{
    public function __invoke(int $id): void
    {
        $response = response();
        $producto = new Producto();
        $request = new ProductoRequest($id);
        $productoEncontrado = $producto->find($id);

        $validated = $request->validated();
        $validated['id'] = $id;

        // Si se ha subido una nueva imagen
        if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
            // Borrar imagen anterior si existe
            if ($productoEncontrado && isset($productoEncontrado['imagen'])) {
                $rutaImagen = dirname(__DIR__, 4) . '/public/img/' . $productoEncontrado['imagen'];
                if (file_exists($rutaImagen)) {
                    unlink($rutaImagen);
                }
            }

            // Guardar nueva imagen
            $nombreImagen = $_FILES['imagen']['name'];
            $validated['imagen'] = $nombreImagen;
            move_uploaded_file(
                $_FILES['imagen']['tmp_name'],
                dirname(__DIR__, 4) . '/public/img/' . $nombreImagen
            );
        } else {
            // No se subió imagen nueva → mantener imagen anterior
            $validated['imagen'] = $productoEncontrado['imagen'] ?? null;
        }

        $productoActualizado = $producto->update($validated);
        if ($productoActualizado !== false) {
            $response->httpCode(200)->json([
                'status' => 'success',
                'message' => 'Se actualizó el producto',
            ]);
        } else {
            $response->httpCode(404)->json([
                'status' => 'error',
                'message' => 'No se pudo actualizar el producto.',
            ]);
        }
    }
}
