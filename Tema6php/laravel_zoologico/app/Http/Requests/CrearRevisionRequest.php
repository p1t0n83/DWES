<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CrearRevisionRequest extends FormRequest
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
        'fecha' => 'required|date',
        'descripcion' => 'required',
        'animal_id' => 'required',
    ];
}

public function messages()
{
    return [
        'fecha.required' => 'La fecha es requerida.',
        'descripcion' => 'La descripcion es requerida.',
        'animal_id.required' => 'El id del animal es requerido.'
    ];
}
}
