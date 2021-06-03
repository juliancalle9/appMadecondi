<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class supplierFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nit' => 'required|unique:suppliers,nit|min:9',
            'nombre' => 'required|min:4',
            'direccion' => 'required|min:8|max:50',
            'telefono' => 'required||min:7|max:15',
            'idciudad' => 'required'
        ];
    }
}
