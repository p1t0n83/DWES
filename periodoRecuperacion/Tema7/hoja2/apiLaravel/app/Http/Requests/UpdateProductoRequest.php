<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductoRequest extends FormRequest
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
        // Obtenemos el id del producto a actualizar para excluirlo de la validación unique
        $productoId = $this->route('producto') ?? $this->input('id');

        return [
            'id' => 'required|numeric',
            'nombre' => 'required|max:100|unique:productos,nombre,' . $productoId,
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'categoria_id' => 'required|integer|exists:categorias,id',
        ];
    }

    public function messages(): array
    {
        return [
            'id.required' => 'El id es obligatorio',
            'id.numeric' => 'El id tiene que ser un número',

            'nombre.required' => 'El nombre es obligatorio',
            'nombre.max' => 'El nombre no puede tener más de 100 caracteres',
            'nombre.unique' => 'El nombre ya existe',

            'precio.required' => 'El precio es obligatorio',
            'precio.numeric' => 'El precio debe ser un número',
            'precio.min' => 'El precio no puede ser negativo',

            'stock.required' => 'El stock es obligatorio',
            'stock.integer' => 'El stock debe ser un número entero',
            'stock.min' => 'El stock no puede ser negativo',

            'categoria_id.required'=>'La categoria es obligatoria',
            'categoria_id.integer' => 'La categoría debe ser un número válido',
            'categoria_id.exists' => 'La categoría no existe',
        ];
    }
}
