<?php

/*
 * Developed by Milena Mognon
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RelatorioRequest extends FormRequest
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
            'data_inicial' => 'required|date_format:d/m/Y|before_or_equal:data_final',
            'data_final' => 'required|date_format:d/m/Y|after_or_equal:data_inicial',
            'peritos_ids' => 'nullable|array',
            'secoes_ids' => 'nullable|array'
        ];
    }


    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            
        ];
    }
}
