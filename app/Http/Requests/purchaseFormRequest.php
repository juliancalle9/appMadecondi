<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class purchaseFormRequest extends FormRequest
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
            'idcompra' => 'required',
            'idproucto' => 'required',
            'cantidad' => 'required',
            'precioFinal' => 'required',
            'fechacompra' => 'required',
            'nit' => 'required'
            ];
    }
}
