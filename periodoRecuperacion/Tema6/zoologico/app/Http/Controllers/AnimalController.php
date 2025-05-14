<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use App\Http\Requests\CrearAnimalRequest;
use Illuminate\Support\Facades\Storage;

class AnimalController extends Controller
{


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $animales = Animal::all();
        return view('index', compact('animales'));
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
    public function store(CrearAnimalRequest $request)
    {

        $datos = $request->only([
            'especie',
            'peso',
            'altura',
            'fechaNacimiento',
            'alimentacion',
            'descripcion',
        ]);
        //obtengo imagen
        $imagen = $request->file('imagen');
        //obtengo el nombre de la imagen
        $nombreArchivo = $request->file('imagen')->getClientOriginalName();
        //le cambio el nombre
        $nuevoNombre = uniqid() . "_" . $nombreArchivo;
        //inserto el nombre de la imagen en el animal
        $datos['imagen'] = $nuevoNombre;
        $animal = new Animal($datos);
        //muevo la imagen
        move_uploaded_file($imagen, "assets/imagenes/" . $nuevoNombre);
        $animal->save();
        return redirect()->route('animales.index')->with('success', 'Animal añadido correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($especie)
    {
        $animal = Animal::where('especie', $especie)->firstOrFail();
        return view('show', compact('animal'));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit($especie)
    {
        $animal = Animal::where('especie', $especie)->firstOrFail();
        return view('edit', compact('animal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $datos = $request->only([
            'id',
            'especie',
            'peso',
            'altura',
            'fechaNacimiento',
            'alimentacion',
            'descripcion',

        ]);

        // Obtener el animal antiguo
        $animalAntiguo = Animal::where('id', $request['id'])->firstOrFail();
        if (isset($datos['imagen'])) {
            // Borrar la imagen antigua
            $imagen = $animalAntiguo->imagen;
            Storage::delete('assets/imagenes/' . $imagen);

            // Obtener la nueva imagen y su nombre
            $imagen = $request->file('imagen');
            $nombreArchivo = $imagen->getClientOriginalName();
            $nuevoNombre = uniqid() . "_" . $nombreArchivo;

            // Insertar el nombre de la imagen en los datos
            $datos['imagen'] = $nuevoNombre;
            // Mover la nueva imagen
            move_uploaded_file($imagen, "assets/imagenes/" . $nuevoNombre);
        }
        // Actualizar el animal con los nuevos datos, pequeña comprobacion por si no tuviesen valor que se mantengan los anteriores
        $datosFiltrados = array_filter($datos, function ($valor) {
            return !is_null($valor);
        });

        $animalAntiguo->update($datosFiltrados);





        // Redirigir con éxito
        return redirect()->route('animales.show', $animalAntiguo->especie)->with('success', 'Animal editado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
