<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class clientFormRequest extends FormRequest
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
            'documento' => 'required|unique:clients,documento|numeric|min:7|max:15',
            'nombre' => 'required|min:3|max:30',
            'apellidos' => 'required|min:3|max:30',
            'telefono'=>'numeric|min:7|max:15',
            'correoElectronico' => 'email|min:8|max:50',
            'direccion' => 'min:8|max:50'
        ];
    }
}
