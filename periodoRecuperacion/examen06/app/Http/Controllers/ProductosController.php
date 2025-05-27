<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Imagene;
use App\Models\Familia;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::with(['imagen', 'familia'])->get();
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
        if(!$request->imagen || empty($request->imagen)){
            $familias=Familia::all();
            return view('create',compact('familias'));
        }
            $nombre=$request->imagen->store('','imagenesProducto');
            Imagene::create([
               "nombre"=>$nombre,
               "url"=>"/imagenes/".$nombre
            ]);

            $imagen=Imagene::where("nombre",$nombre)->first();
            if(!$imagen){
                $familias=Familia::all();
                return view('create',compact('familias'));
            }
            $codigoFamilia=$request->familia;
            $familia=Familia::where('codigo',$codigoFamilia)->first();
            if(!$familia){
                $familias=Familia::all();
                return view('create',compact('familias'));
            }

            if(!$request['titulo'] || !$request['precio'] || !$request['descripcion']  ){
                $familias=Familia::all();
                return view('create',compact('familias'));
            }
            $familiaId=$familia->id;
            Producto::create([
                "titulo"=>$request['titulo'],
                "slug"=>Str::slug($request['titulo']),
                "precio"=>$request['precio'],
                "familia_id"=>$familiaId,
                "imagen_id"=>$imagen->id,
                "descripcion"=>$request['descripcion']
            ]);
            return redirect()->route('productos.index')->with('success','Se creo el producto');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $producto=Producto::where('slug',$slug)->first();
        $imagen=Imagene::where('id',$producto->imagen_id);
        $familia=Familia::where('id',$producto->familia_ids);
        return view('show',compact('producto','imagen','familia'));
    }

    /**
     * Show the form for editing the specified resource.
     */

public function edit(string $slug)
{
    try {
        $producto = Producto::where('slug', $slug)->firstOrFail();
        $familias = Familia::all();

        return view('edit', compact('producto', 'familias'));
    } catch (\Exception $e) {
        return redirect()
            ->route('productos.index')
            ->with('error', 'Producto no encontrado');
    }
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
{
    try {
        // Obtener el producto
        $producto = Producto::where('slug', $slug)->firstOrFail();

        // Validar campos obligatorios
        if (!$request->filled(['titulo', 'precio', 'descripcion', 'familia'])) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Todos los campos son obligatorios');
        }

        // Buscar familia
        $familia = Familia::where('codigo', $request->familia)->first();
        if (!$familia) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Familia no encontrada');
        }

        // Si hay nueva imagen
        if ($request->hasFile('imagen') && $request->file('imagen')->isValid()) {
            $nombre = $request->imagen->store('', 'imagenesProducto');

            // Crear nueva imagen
            $nuevaImagen = Imagene::create([
                "nombre" => $nombre,
                "url" => "/imagenes/" . $nombre
            ]);

            // Actualizar producto con nueva imagen
            $producto->update([
                "titulo" => $request->titulo,
                "slug" => Str::slug($request->titulo),
                "precio" => $request->precio,
                "familia_id" => $familia->id,
                "imagen_id" => $nuevaImagen->id,
                "descripcion" => $request->descripcion
            ]);
        } else {
            // Actualizar producto sin cambiar la imagen
            $producto->update([
                "titulo" => $request->titulo,
                "slug" => Str::slug($request->titulo),
                "precio" => $request->precio,
                "familia_id" => $familia->id,
                "descripcion" => $request->descripcion
            ]);
        }

        return redirect()
            ->route('productos.index')
            ->with('success', 'Producto actualizado correctamente');

    } catch (\Exception $e) {
        return redirect()
            ->back()
            ->withInput()
            ->with('error', 'Error al actualizar el producto: ' . $e->getMessage());
    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $producto=Producto::where('slug',$slug)->first();
        $imagen=Imagene::where('id',$producto->imagen_id);
        $producto->delete();
        $imagen->delete();
        return redirect()->route('productos.index');
    }
}
