<?php

namespace App\Http\Requests\Armas;

use Illuminate\Foundation\Http\FormRequest;

class EspingardaRequest extends FormRequest
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
            'tipo_serie' => 'required|between:5,40',
//            'num_serie' => 'nullable'
            'comprimento_cano' => 'required|between:5,10',
            'comprimento_total' => 'required|between:5,10',
            'sistema_percussao' => 'required|between:5,30',
            'estado_geral' => 'required|between:2,15',
            'funcionamento' => 'required|between:5,15',
            'tipo_acabamento' => 'required|between:5,30',
            'tipo_arma' => 'required|between:5,30',
            'sistema_funcionamento' => 'required|between:5,30',
            'num_canos' => 'required',
            'disposicao_canos' => 'nullable|max: 40',
            'teclas_gatilho' => 'nullable|max: 25',
            'sistema_carregamento' => 'required|between:5,30',
            'coronha_fuste' => 'required|between:5,30',
            'chave_abertura' => 'nullable|max: 40',
            'tipo_carregador' => 'nullable|max: 40',
        ];
    }
}
