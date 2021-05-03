<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class saleFormRequest extends FormRequest
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
            
                'nombreCliente' => 'required',
                'telefono' => 'required|numeric',
                'direccion' => 'required',
                'precioUnitario' => 'required|numeric',
                'precioTotal' => 'required|numeric',
            
        ];
    }
}
