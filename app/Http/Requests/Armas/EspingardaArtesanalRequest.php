<?php

/*
 * Developed by Milena Mognon
 */

namespace App\Http\Requests\Armas;

use Illuminate\Foundation\Http\FormRequest;

class EspingardaArtesanalRequest extends FormRequest
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
            'calibre_id' => 'required_if: calibre_real, |integer',
            'calibre_real' => 'required_if:calibre_id, ',
            'laudo_id' => 'required|integer',
            'comprimento_cano' => 'required|between:5,10',
            'comprimento_total' => 'required|between:5,10',
            'estado_geral' => 'required|between:2,25',
            'funcionamento' => 'required|between:5,25',
            'tipo_arma' => 'required|between:5,30',
            'coronha_fuste' => 'required|between:5,30',
            'bandoleira' => 'nullable|between: 5,70',
            'num_lacre' => 'required'
        ];
    }
}
