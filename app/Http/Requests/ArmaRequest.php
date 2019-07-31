<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArmaRequest extends FormRequest
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
            'marca_id' => 'required|integer',
            'calibre_id' => 'required|integer',
            'origem_id' => 'required|integer',
            'laudo_id' => 'required|integer',
            'modelo' => 'nullable',
            'tipo_serie' => 'required|between:5,40',
//            'num_serie' => 'nullable'
            'quantidade_raias' => 'required|integer|min:0|max:30',
            'comprimento_cano' => 'required|between:5,10',
            'comprimento_total' => 'required|between:5,10',
            'altura' => 'required|between:5,10',
            'sistema_percussao' => 'required|between:5,30',
            'tambor_rebate' => 'required|between:5,15',
            'capacidade_tambor' => 'required|integer|min:0|max:30',
            'estado_geral' => 'required|between:2,15',
            'funcionamento' => 'required|between:5,15',
            'sentido_raias' => 'required|between:5,30',
            'cabo' => 'required|between:4,30',
            'tipo_acabamento' => 'required|between:5,30',
            'tipo_arma' => 'required|between:5,30',
        ];
    }
}
