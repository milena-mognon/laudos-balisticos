<?php

/*
 * Developed by Milena Mognon
 */

namespace App\Http\Requests\Armas;

use Illuminate\Foundation\Http\FormRequest;

class MunicaoRequest extends FormRequest
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
            'laudo_id' => 'required|integer',
            'tipo_municao' => 'required|between:5,30',
            'projetil' => 'nullable|max:40',
            'estojo' => 'nullable|max:40',
            'tipo_projetil' => 'nullable|max:40',
            'nao_deflagrado' => 'nullable',
            'quantidade' => 'required|integer',
            'funcionamento' => 'required|max:40'

        ];
    }
}
