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
            'especie'=>'required|min:4',
            'peso'=>'required',
            'altura'=>'required',
            'fechaNacimiento'=>'required',
            'imagen'=>'required|image|mimes:jpeg,png,jpg,svg'
        ];
    }

    public function messages(){
        return[
          'especie.required'=>'La especie es obligatoria',
          'especie.min'=>'La especie debe de tener como minimo 3 caracteres',
          'peso.required'=>'El peso es obligatorio',
          'altura.required'=>'La altura es obligatoria',
          'fechaNacimiento.required'=>'La fecha de nacimiento es obligatoria',
          'imagen.required'=>'La imagen es obligatoria',
          'imagen.images'=>'El fichero tiene que ser una imagen',
          'imagen.mimes'=>'La imagen tiene que tener uno de estos formatos: jpeg, png, jpg o svg'
        ];


    }
}
