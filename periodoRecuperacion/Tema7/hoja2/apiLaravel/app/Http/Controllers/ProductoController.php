<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ProductoResource;
use App\Models\Producto;
use App\Http\Requests\StoreProductoRequest;
use App\Http\Requests\UpdateProductoRequest;
/**
 * @OA\Info(title="API Productos", version="1.0",description="API de productos",
 * @OA\Server(url="http://localhost:8000"),
 * @OA\Contact(email="email@gmail.com"))
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
        $productos = Producto::with('categoria')->get();
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
     * @OA\RequestBody(
     * required=true,
     * @OA\JsonContent(ref="#/components/schemas/Producto")
     * ),
     *  @OA\Response(
     *  response=404,
     *  description="Producto no creado"
     *  )
     * )
     */
    public function store(StoreProductoRequest $request)
    {
        $validado = $request->validated();
        $producto = Producto::create($validado);
        return new ProductoResource($producto);
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
     */
    public function show(string $id)
    {
        $producto = Producto::with('categoria')->findOrFail($id);
        if ($producto==null) {
            return response()->json([
                'success' => false,
                'message' => 'No se encontro el producto',
                'data' => [],
            ], 200);
        }
        return response()->json([
            'success' => true,
            'message' => 'Producto encontrado',
            'data' => $producto,
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
     *  @OA\RequestBody(
     * required=true,
     * @OA\JsonContent(ref="#/components/schemas/Producto")
     * ),
     *  @OA\Response(
     *  response=404,
     *  description="Producto no editado"
     *  )
     * )
     */
    public function update(UpdateProductoRequest $request, string $id)
    {
        $validado = $request->validated();
        $producto = Producto::findOrFail($id);
        $producto->update($validado);
        return new ProductoResource($producto);
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
     *  @OA\Response(
     *  response=200,
     *  description="Producto eliminado",
     *  @OA\JsonContent(ref="#/components/schemas/Producto")
     * ),
     *  @OA\Response(
     *  response=404,
     *  description="Producto no eliminado"
     *  )
     * )
     */
    public function destroy(string $id)
{
    if (Producto::destroy($id) == 1) {
        return response()->json([
            'status' => 'success',
            'message' => 'Producto borrado con éxito'
        ], 200);
    } else {
        return response()->json([
            'status' => 'error',
            'message' => 'No se pudo borrar el producto'
        ], 404);
    }
}
}
