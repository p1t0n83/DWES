<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use Carbon\Carbon;
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
	public function store(Request $request)
	{
		//
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
	public function edit($id)
{
    $animal = Animal::findOrFail($id);
    return view('edit', compact('animal'));
}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, string $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(string $id)
	{
		//
	}

	
}
