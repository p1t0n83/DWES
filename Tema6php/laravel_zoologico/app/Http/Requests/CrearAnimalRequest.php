<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CrearAnimalRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
{
    return [
        'especie' => 'required|min:3',
        'peso' => 'required',
        'altura' => 'required',
        'fecha_nacimiento' => 'required|date',
        'imagen' => 'required|mimes:jpeg,png,jpg,svg',
    ];
}

public function messages()
{
    return [
        'especie.required' => 'La especie es requerida.',
        'especie.min' => 'La especie debe tener al menos 3 caracteres.',
        'peso.required' => 'El peso es requerido.',
        'altura.required' => 'La altura es requerida.',
        'fecha_nacimiento.required' => 'La fecha de nacimiento es requerida.',
        'imagen.required' => 'La imagen es requerida.',
        'imagen.mimes' => 'Los tipos de imágenes permitidas son jpeg, png, jpg y svg.',
    ];
}
}
