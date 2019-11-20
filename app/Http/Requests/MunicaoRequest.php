<?php

/*
 * Developed by Milena Mognon
 */

namespace App\Http\Requests;

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
            'projetil' => 'required_unless:tipo_municao,estojo|max:40',
            'estojo' => 'required_unless:tipo_municao,projétil|max:40',
            'tipo_projetil' => 'required_unless:tipo_municao,estojo|max:40',
            'nao_deflagrado' => 'nullable',
            'quantidade' => 'required|integer',
            'funcionamento' => 'required_if:tipo_municao,cartucho|max:40'
        ];
    }

    public function messages()
    {
        return [
            'funcionamento.required_if' => 'O campo funcionamento é obrigatório quando o tipo da municão for cartucho.',
            'tipo_projetil.required_unless' => 'O projétil (tipo) é necessário a menos que o tipo da municao seja estojo.',
            'projetil.required_unless' => 'O projétil é necessário a menos que o tipo da municão seja estojo.',
            'estojo.required_unless' => 'O estojo é necessário a menos que o tipo da municão seja projétil.',

        ];
    }
}
