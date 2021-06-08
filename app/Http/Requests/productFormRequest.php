<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class productFormRequest extends FormRequest
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
            
        'nombre' => 'required|min:3',
        'preciocompra' => 'required|numeric|min:0',
        'preciocompra' => 'required|numeric|min:0',
        'stock'=> 'required|numeric|min:0', 
        'estado',
        'idcategoria' => 'required',
        ];
    }

}

