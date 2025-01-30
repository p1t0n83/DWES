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
    public function rules(): array
    {
        return [
            "especie"=>"required|string|min:3",
            "peso"=>"required|numeric",
            "altura"=>"required|numeric",
            "fechaNacimiento"=>"required|date",
            "imagen"=>"required|image|mimes:jpeg,png,jpg,svg|max:2048"
        ];
    }
    public function messages(): array
{
    return [
        "especie.required" => "La especie es obligatoria.",
        "especie.min" => "La especie debe tener al menos 3 caracteres.",
        "peso.required" => "El peso es obligatorio.",
        "peso.numeric" => "El peso debe ser un número.",
        "altura.required" => "La altura es obligatoria.",
        "altura.numeric" => "La altura debe ser un número.",
        "fechaNacimiento.required" => "La fecha de nacimiento es obligatoria.",
        "fechaNacimiento.date" => "La fecha de nacimiento debe ser una fecha válida.",
        "imagen.required" => "La imagen es obligatoria.",
        "imagen.image" => "El archivo debe ser una imagen.",
        "imagen.mimes" => "Los formatos permitidos son: jpeg, png, jpg, svg.",
        "imagen.max" => "La imagen no puede superar los 2MB.",
    ];
}
}
