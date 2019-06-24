<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'email' => 'required|string|email|max:255|unique:users',
            'nome' => 'required|min:6',
            'secao_id' => 'required|int',
            'cargo_id' => 'required|int',
            'password' => 'required|string|min:6',
            'confirmacao_senha' => 'required|same:password|min:6'
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
            'confirmacao_senha' => 'confirmação de senha'
        ];
    }
}
