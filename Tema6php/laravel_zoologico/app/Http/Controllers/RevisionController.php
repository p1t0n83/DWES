<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Revision;
use App\Models\Animal;
use App\Http\Requests\CrearRevisionRequest;
class RevisionController extends Controller
{
    public function create(Animal $animal)
    {
        return view('revisiones.create',compact('animal'));
    }

    public function store(CrearRevisionRequest $request)
    {
         // Buscar el animal por la especie

        $r=new Revision();
        $r->fecha=$request->fecha;
        $r->descripcion=$request->descripcion;
        $r->animalid=$request->animalId;
        $r->save();
        return redirect()->route('animales.show', $r->animalid)
                     ->with('success', 'Animal creado correctamente.');
    }
}
