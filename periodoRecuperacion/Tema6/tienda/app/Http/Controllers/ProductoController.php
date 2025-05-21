<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\ProductosRequest;
use Illuminate\Support\Str;
use App\Models\Image;

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
        return view('productos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductosRequest $request)
    {
      
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $producto)
    {
        return view('productos.show', compact('producto'));
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
