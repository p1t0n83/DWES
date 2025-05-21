<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Image;
use App\Http\Requests\ProductosRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Product::all();
        return view('index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductosRequest $request)
    {
         $datos=$request->all();
         $producto = Product::create([
        'nombre' => $datos['nombre'],
        'slug' => Str::slug($datos['nombre']),
        'precio' => $datos['precio'],
        'stock' => $datos['stock'],
        'descripcion' => $datos['descripcion'],
        'familia' => $datos['familia']
    ]);

        /**
         * $request->imagen->isValid();
         * !empty($request->imagen);
         * $request->imagen->store('',);
         */

         if($request->imagen->isValid() &&  !empty($request->imagen)){

         $url=$request->imagen->store('','imagenes');
        // Crear registro de imagen
        Image::create([
            'titulo'=>$producto->nombre,
            'url' => $url,
            'producto' => $producto->id
        ]);
    }


    return redirect()
        ->route('productos.index')
        ->with('success', 'Producto creado correctamente.');

    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
     $producto=Product::where('slug',$slug)->firstOrFail();
     return view('show',compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $producto)
    {
        return view('productos.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductosRequest $request, Product $producto)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($data['nombre']);
        $producto->update($data);
        return redirect()->route('productos.index')->with('success', 'Producto actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $producto)
    {
        $producto->delete();
        return redirect()->route('productos.index')->with('success', 'Producto eliminado correctamente');
    }
}
