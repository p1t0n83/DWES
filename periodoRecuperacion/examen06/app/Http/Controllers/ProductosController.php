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
    $productos=Producto::all()->get();

    return view('index',compact('productos'));
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

            $imagen=Imagene::where("nombre",$nombre);
            if(!$imagen){
                $familias=Familia::all();
                return view('create',compact('familias'));
            }
            $codigoFamilia=$request->familia;
            $familia=Familia::where('codigo',$codigoFamilia);
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
        $producto=Producto::where('slug',$slug);
        $imagen=Imagene::where('id',$producto->imagen_id);
        $familia=Familia::where('id',$producto->familia_ids);
        return view('show',compact('producto','imagen','familia'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        return view('edit',compact('slug'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {

            $producto=Producto::where('slug',$slug);

            $familias=Familia::all();
            return view('create',compact('familias'));

            $nombre=$request->imagen->store('','imagenesProducto');
            Imagene::create([
               "nombre"=>$nombre,
               "url"=>"/imagenes/".$nombre
            ]);

            $imagen=Imagene::where("nombre",$nombre);
            if(!$imagen){
                $familias=Familia::all();
                return view('create',compact('familias'));
            }
            $codigoFamilia=$request->familia;
            $familia=Familia::where('codigo',$codigoFamilia);
            if(!$familia){
                $familias=Familia::all();
                return view('create',compact('familias'));
            }

            if(!$request['titulo'] || !$request['precio'] || !$request['descripcion']  ){
                $familias=Familia::all();
                return view('create',compact('familias'));
            }
            $familiaId=$familia->id;
            if(!$request->imagen || empty($request->imagen)){
            $producto::update([
                "titulo"=>$request['titulo'],
                "slug"=>Str::slug($request['titulo']),
                "precio"=>$request['precio'],
                "familia_id"=>$familiaId,
                "imagen_id"=>$imagen->id,
                "descripcion"=>$request['descripcion']
            ]);
            return redirect()->route('productos.index')->with('success','Se edito el producto');
    }else{
        $producto::update([
            "titulo"=>$request['titulo'],
            "slug"=>Str::slug($request['titulo']),
            "precio"=>$request['precio'],
            "familia_id"=>$familiaId,
            "descripcion"=>$request['descripcion']
        ]);
        return redirect()->route('productos.index')->with('success','Se edito el producto');

    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $producto=Producto::where('slug',$slug);
        $imagen=Imagene::where('id',$producto->id);
        $producto->delete();
        $imagen->delete();
    }
}
