<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use App\Http\Requests\CrearAnimalRequest;
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
{
    $animal = new Animal();
    $animal->id=$request->id;
    $animal->especie = $request->especie;
    $animal->peso = $request->peso;
    $animal->altura = $request->altura;
    $animal->fecha_nacimiento = $request->fecha_nacimiento;
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
    $animal->especie = $request->especie;
    $animal->peso = $request->peso;
    $animal->altura = $request->altura;
    $animal->fecha_nacimiento = $request->fecha_nacimiento;
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
