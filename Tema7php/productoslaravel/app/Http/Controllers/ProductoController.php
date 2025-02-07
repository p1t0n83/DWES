<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductoResource;
use Illuminate\Http\Request;
use App\Models\Producto;

/**
 * @OA\Info(title="API Productos", version="1.0",description="API de productos",
 * @OA\Server(url="http://localhost:8000"),
 * @OA\Contact(email="email@gmail.com"))
 */
class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::with('categoria')->get();

        return ProductoResource::collection($productos);
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
     *  )
     * )
     *
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
    public function show(Producto $producto)
    {
        return new ProductoResource($producto->load('categoria'));
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
     *  )
     * )
     * * @OA\Response(
     * response=401,
     * description="No autorizado"
     * )
     *
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
    public function crear() {}
}
