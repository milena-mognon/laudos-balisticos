<?php

/*
 * Developed by Milena Mognon
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
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
            'email' => ['required',
                        'string',
                        'email',
                        'max:255',
                        Rule::unique('users')->ignore($this->user->id),
                    ],
            'nome' => 'required|min:6',
            'secao_id' => 'required|int',
            'cargo_id' => 'required|int',
            'nova_senha' => 'nullable|string|min:6',
            'confirmacao_nova_senha' => 'nullable|same:nova_senha|min:6'
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
            'secao_id' => 'seção',
            'cargo_id' => 'cargo',
            'confirmacao_nova_senha' => 'confirmação da nova senha',
            'nova_senha' => 'nova senha'
        ];
    }
}
