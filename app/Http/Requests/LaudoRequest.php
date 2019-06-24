<?php

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
            'data_designacao' => 'required|date_format:"d/m/Y"',
            'data_solicitacao' => 'required|date_format:"d/m/Y"',
            'secao_id' => 'required',
            'cidade_id' => 'required',
            'solicitante_id' => 'required',
            'perito_id' => 'required',
            'diretor_id' => 'required',
            'indiciado' => 'required|min:6',
            'inquerito' => 'required'
        ];
    }
}
