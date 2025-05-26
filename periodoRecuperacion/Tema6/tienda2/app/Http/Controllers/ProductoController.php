<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Familia;
use Illuminate\Support\Facades\Storage;
class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::all();
        return view('index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $familias=Familia::all();
        return view('create',compact('familias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        if ($request->imagen->isValid() && !empty($request->imagen)) {
            $nombreImagen = $request->imagen->store('', 'imagenes');
            $datos = $request->all();
            Producto::create([
                "titulo" => $datos['titulo'],
                "slug"=>Str::slug($datos['titulo']),
                "descripcion" => $datos['descripcion'],
                "precio" => $datos['precio'],
                "familia" => $datos['familia'],
                "nombre_imagen" => $nombreImagen
            ]);
        }

        return redirect()->route('inicio')->with('success', 'Producto creado');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $producto = Producto::where('slug', $slug)->firstOrFail();
        return view('show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $producto = Producto::where('slug', $slug)->firstOrFail();
        $familias = Familia::all();
        return view('edit', compact('producto', 'slug', 'familias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
        $producto = Producto::where('slug', $slug)->firstOrFail();
        if ($request->imagen->isValid() && !empty($request->imagen)) {
            $nombreImagen = $request->imagen->store('', 'imagenes');
            $datos = $request->all();
            if ($producto->nombre_imagen && Storage::disk('imagenes')->exists($producto->nombre_imagen)) {
                Storage::disk('imagenes')->delete($producto->nombre_imagen);
            }
            $producto->update([
                "titulo" => $datos['titulo'],
                "slug"=>Str::slug($datos['titulo']),
                "descripcion" => $datos['descripcion'],
                "precio" => $datos['precio'],
                "familia" => $datos['familia'],
                "nombre_imagen" => $nombreImagen
            ]);
        } else {
            $datos = $request->all();
            $producto->update([
                "titulo" => $datos['titulo'],
                "slug"=>Str::slug($datos['titulo']),
                "descripcion" => $datos['descripcion'],
                "precio" => $datos['precio'],
                "familia" => $datos['familia'],
            ]);
        }

        return redirect()->route('inicio')->with('success', 'Producto creado');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $producto = Producto::where('slug', $slug)->firstOrFail();
        if ($producto->nombre_imagen && Storage::disk('imagenes')->exists($producto->nombre_imagen)) {
            Storage::disk('imagenes')->delete($producto->nombre_imagen);
        }
        $producto->delete();
        return redirect()->route('inicio')->with('success', 'Producto eliminado');
    }
}
