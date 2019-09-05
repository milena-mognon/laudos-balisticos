<?php

/*
 * Developed by Milena Mognon
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LaudoRequest extends FormRequest
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
            'oficio' => 'required',
            'rep' => 'required',
            'data_designacao' => 'required|date_format:"d/m/Y"|after_or_equal:data_solicitacao',
            'data_solicitacao' => 'required|date_format:"d/m/Y"|before_or_equal:data_designacao',
            'secao_id' => 'required',
            'cidade_id' => 'required',
            'solicitante_id' => 'required',
            'perito_id' => 'required',
            'diretor_id' => 'required',
            'indiciado' => 'nullable|min:6|max:80',
            'tipo_inquerito' => 'nullable|max:80',
            'inquerito' => 'nullable|max:20',
        ];
    }
}
