<?php

namespace App\Http\Controllers;


use App\Models\Animal;
use App\Http\Requests\CrearAnimalRequest;
use Illuminate\Support\Str;
class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $animales = Animal::all();
        return view("animales.index", compact('animales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("animales.create");
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(CrearAnimalRequest $request)
{   dd($request->all());
    $animal = new Animal();
    $animal->especie = $request->especie;
    $animal->peso = $request->peso;
    $animal->altura = $request->altura;
    $animal->fecha_nacimiento = $request->fecha_nacimiento;
    $animal->alimentacion = $request->alimentacion;
    $animal->descripcion = $request->descripcion;
    $animal->slug = Str::slug($animal->especie);
    if ($request->hasFile('imagen')) {
        $animal->imagen = $request->file('imagen')->store('imagenes', 'public');
    }
    $animal->save();

       return redirect(route('animales.show', $animal));
}

    /**
     * Display the specified resource.
     */
    public function show(Animal $animal)
    {

        return view("animales.show", compact('animal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Animal $animal)
    {
        return view("animales.edit", compact('animal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CrearAnimalRequest $request, Animal $animal)
    {
        dd($request->all());
        $animal->especie = $request->especie;
        $animal->peso = $request->peso;
        $animal->altura = $request->altura;
        $animal->fecha_nacimiento = $request->fecha_nacimiento;
        $animal->alimentacion = $request->alimentacion;
        $animal->descripcion = $request->descripcion;
        $animal->slug = Str::slug($request->especie . '-' . time()); // Opcional: actualiza el slug
    
        if ($request->hasFile('imagen')) {
            $animal->imagen = $request->file('imagen')->store('imagenes', 'public');
        }
    
        $animal->save();
    
        return redirect(route('animales.show', $animal));
    }

public function revision(Animal $animal ){
    return view("animales.revision", compact('animal'));
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
