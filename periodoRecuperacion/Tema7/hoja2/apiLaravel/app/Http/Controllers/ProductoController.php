<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Http\Resources\ProductoResource;
use App\Models\Producto;
use App\Models\Imagen;
use App\Http\Requests\StoreProductoRequest;
use App\Http\Requests\UpdateProductoRequest;
/**
 * @OA\Info(title="API Productos", version="1.0",description="API de productos",
 * @OA\Server(url="http://localhost:8000"),
 * @OA\Contact(email="email@gmail.com"))
 * @OA\SecurityScheme(
 *     type="http",
 *     description="Use a token to authenticate",
 *     name="Authorization",
 *     in="header",
 *     scheme="bearer",
 *     bearerFormat="JWT",
 *     securityScheme="bearerAuth",
 * )
 */

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    /**
     * @OA\Get(
     *  path="/api/productos",
     *  summary="Obtener productos",
     *  description="Obtener todos los productos",
     *  operationId="index",
     *  tags={"productos"},
     *  @OA\Response(
     *  response=200,
     *  description="Productos encontrados",
     *  @OA\JsonContent(ref="#/components/schemas/Producto")
     * ),
     *  @OA\Response(
     *  response=404,
     *  description="Productos no encontrados"
     *  )
     * )
     */
    public function index()
    {
        $productos = Producto::with(['categoria', 'imagen'])->get();
        if ($productos->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'No se encontraron productos',
                'data' => [],
            ], 200);
        }
        return response()->json([
            'success' => true,
            'message' => 'Productos encontrados',
            'data' => ProductoResource::collection($productos),
        ], 200);
    }



    /**
     * Store a newly created resource in storage.
     */
    /**
     * @OA\POST(
     *  path="/api/productos",
     *  summary="Crear un producto",
     *  description="Crear un producto segun los datos pasados",
     *  operationId="create",
     *  tags={"productos"},
     *  @OA\Response(
     *  response=200,
     *  description="Producto creado",
     *  @OA\JsonContent(ref="#/components/schemas/Producto")
     * ),
     * security=bearerAuth},
     * @OA\RequestBody(
     * required=true,
     * @OA\JsonContent(ref="#/components/schemas/Producto")
     * ),
     *  @OA\Response(
     *  response=404,
     *  description="Producto no creado"
     *  ),
     * @OA\Response(
     * response=401,
     * description="No autorizado"
     * )
     * )
     */
    public function store(StoreProductoRequest $request)
    {
        $datos = $request->validated();

        if ($request->hasFile('imagen') && $request->imagen->isValid()) {
            // Guardar la imagen en disco 'imagenes'
            $nombreImagen = $request->imagen->store('', 'imagenes');

            // Crear registro en la tabla imágenes
            $imagen = Imagen::create(['nombre' => $nombreImagen]);

            // Guardar el id de la imagen en los datos del producto
            $datos['imagen_id'] = $imagen->id;
        }

        // Crear producto con los datos (incluyendo imagen_id)
        $producto = Producto::create($datos);

        // Cargar relaciones
        $producto->load(['categoria', 'imagen']);

        return response()->json([
            'success' => true,
            'message' => 'Producto creado con éxito',
            'data' => new ProductoResource($producto),
        ], 201);
    }


    /**
     * Display the specified resource.
     */
    /**
     * @OA\Get(
     *  path="/api/productos/{id}",
     *  summary="Obtener un producto",
     *  description="Obtener un producto por su id",
     *  operationId="show",
     *  tags={"productos"},
     *  @OA\Parameter(
     *      name="id",
     *      in="path",
     *      description="Id del producto",
     *   required=true,
     *   @OA\Schema(type="integer",example="1")
     *  ),
     *  @OA\Response(
     *  response=200,
     *  description="Producto encontrado",
     *  @OA\JsonContent(ref="#/components/schemas/Producto")
     * ),
     *  @OA\Response(
     *  response=404,
     *  description="Producto no encontrado"
     *  ),
     * @OA\Response(
     * response=401,
     * description="No autorizado"
     * )
     * )
     */
    public function show(string $id)
    {
        $producto = Producto::with(['categoria', 'imagen'])->find($id);

        if (!$producto) {
            return response()->json([
                'success' => false,
                'message' => 'No se encontró el producto',
                'data' => [],
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Producto encontrado',
            'data' => new ProductoResource($producto),
        ], 200);
    }



    /**
     * Update the specified resource in storage.
     */
    /**
     * @OA\PUT(
     *  path="/api/productos/{id}",
     *  summary="Editar un producto",
     *  description="Editar un producto segun los datos pasados y su id",
     *  operationId="edit",
     *  tags={"productos"},
     *  @OA\Parameter(
     *  name="id",
     *  in="path",
     *  description="Id del producto",
     *  required=true,
     *  @OA\Schema(type="integer",example="1")
     *  ),
     *  @OA\Response(
     *  response=200,
     *  description="Producto editado",
     *  @OA\JsonContent(ref="#/components/schemas/Producto")
     * ),
     * security=bearerAuth},
     *  @OA\RequestBody(
     * required=true,
     * @OA\JsonContent(ref="#/components/schemas/Producto")
     * ),
     *  @OA\Response(
     *  response=404,
     *  description="Producto no editado"
     *  ),
     * @OA\Response(
     * response=401,
     * description="No autorizado"
     * )
     * )
     */
    public function update(UpdateProductoRequest $request, string $id)
    {
        $producto = Producto::findOrFail($id);
        $datos = $request->validated();

        // Si viene imagen válida nueva, borrar la anterior y subir la nueva
        if ($request->hasFile('imagen') && $request->imagen->isValid()) {
            if ($producto->nombre_imagen && Storage::disk('imagenes')->exists($producto->nombre_imagen)) {
                Storage::disk('imagenes')->delete($producto->nombre_imagen);
            }

            $nombreImagen = $request->imagen->store('', 'imagenes');

            // Crear registro en la tabla imágenes
            $imagen = Imagen::create(['nombre' => $nombreImagen]);

            // Guardar el id de la imagen en los datos del producto
            $datos['imagen_id'] = $imagen->id;
        }

        $producto->update($datos);
        $producto->load(['categoria', 'imagen']);

        return response()->json([
            'success' => true,
            'message' => 'Producto actualizado con éxito',
            'data' => new ProductoResource($producto),
        ], 200);
    }



    /**
     * Remove the specified resource from storage.
     */
    /**
     * @OA\DELETE(
     *  path="/api/productos/{id}",
     *  summary="Eliminar un producto",
     *  description="Eliminar un producto por su id",
     *  operationId="destroy",
     *  tags={"productos"},
     *  @OA\Parameter(
     *      name="id",
     *      in="path",
     *      description="Id del producto",
     *   required=true,
     *   @OA\Schema(type="integer",example="1")
     *  ),
     * security=bearerAuth},
     *  @OA\Response(
     *  response=200,
     *  description="Producto eliminado",
     *  @OA\JsonContent(ref="#/components/schemas/Producto")
     * ),
     *  @OA\Response(
     *  response=404,
     *  description="Producto no eliminado"
     *  ),
     * @OA\Response(
     * response=401,
     * description="No autorizado"
     * )
     * )
     */
    public function destroy(string $id)
    {
        $producto = Producto::find($id);

        if (!$producto) {
            return response()->json([
                'success' => false,
                'message' => 'Producto no encontrado',
            ], 404);
        }

        // Borrar imagen asociada si existe en el disco
        if ($producto->nombre_imagen && Storage::disk('imagenes')->exists($producto->nombre_imagen)) {
            Storage::disk('imagenes')->delete($producto->nombre_imagen);
        }

        $producto->delete();

        return response()->json([
            'success' => true,
            'message' => 'Producto borrado con éxito'
        ], 200);
    }


}
