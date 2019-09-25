<?php

/*
 * Developed by Milena Mognon
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComponenteRequest extends FormRequest
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
            'componente' => 'required|max:40',
            'quantidade_frascos' => 'required|integer',
            'quantidade' => 'required|max:10',
            'tamanho' => 'required_unless:componente,Espoletas|max:15',
            'material_frascos' => 'required_unless:quantidade_frascos,0|max:40'
        ];
    }
}
