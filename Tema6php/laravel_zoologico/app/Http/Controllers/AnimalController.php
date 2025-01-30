<?php

namespace App\Http\Controllers;

use App\Http\Requests\CrearAnimalRequest;
use App\Models\Animal;
use Illuminate\Support\Str;
class AnimalController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $animalesLista=Animal::all();
        return view('animales.index',compact('animalesLista'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('animales.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CrearAnimalRequest $request)
    {
        $animal=new Animal();
        $animal->especie=$request->especie;
        $animal->peso=$request->peso;
        $animal->altura=$request->altura;
        $animal->fechaNacimiento=$request->fechaNacimiento;
        $animal->alimentacion=$request->alimentacion;
        $animal->descripcion=$request->descripcion;
        $animal->slug = Str::slug($request->input('especie'));
        if ($request->hasFile('imagen')) {
            $rutaImagen = $request->file('imagen')->store('animales', 'public');
            $animal->imagen = $rutaImagen;
        }
        $animal->save();
        return redirect()->route('animales.show', $animal->id)
                     ->with('success', 'Animal creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Animal $animal)
{
    return view('animales.show', compact('animal'));
}
    
   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Animal $animal)
    {
        return view('animales.edit',compact('animal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CrearAnimalRequest $request, Animal $animal)
{
    // Actualizar los demás campos del animal
    $animal->especie = $request->input('especie');
    $animal->peso = $request->input('peso');
    $animal->altura = $request->input('altura');
    $animal->fechaNacimiento = $request->input('fechaNacimiento');
    $animal->alimentacion = $request->alimentacion;
    $animal->descripcion = $request->descripcion;
    $animal->slug = Str::slug($request->input('especie'));

    // Si el usuario sube una nueva imagen
    if ($request->hasFile('imagen')) {
        // Almacenar la imagen en la carpeta 'public/assets/imagenes'
        // Primero verificamos si la carpeta existe, sino la creamos
        $rutaDestino = public_path('assets/imagenes');
        if (!file_exists($rutaDestino)) {
            mkdir($rutaDestino, 0777, true);
        }

        // Subir la imagen directamente a 'public/assets/imagenes'
        $imagen = $request->file('imagen');
        $nombreImagen = Str::slug($request->input('especie')) . '.' . $imagen->getClientOriginalExtension();
        $imagen->move($rutaDestino, $nombreImagen);

        // Guardamos la ruta de la imagen en la base de datos
        $animal->imagen = $nombreImagen;
    }

    // Guardar los cambios en la base de datos
    $animal->save();

    // Redirigir a la vista de detalle del animal
    return redirect()->route('animales.show', $animal->id)
                     ->with('success', 'Animal actualizado correctamente.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
