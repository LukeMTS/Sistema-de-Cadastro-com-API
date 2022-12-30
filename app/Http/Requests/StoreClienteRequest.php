<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClienteRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'cnpj'         => 'required|size:14|unique:clientes,cnpj',
            'razao_social' => 'required|max:255',
            'nome'         => 'required|max:255',
            'telefone'     => 'required|size:11|unique:clientes,telefone',
        ];
    }

    public function messages()
    {
        return [
            'cnpj.required'         => 'O :attribute é obrigatório',
            'cnpj.size'             => 'O CNPJ deve conter 14 dígitos sem pontuação',
            'cnpj.unique'           => 'O :attribute informado já está cadastrado',
            'razao_social.required' => 'A razão social é obrigatório',
            'razao_social.max'      => 'A razão social deve conter no máximo 255 caracteres',
            'nome.required'         => 'O :attribute é obrigatório',
            'nome.max'              => 'A nome deve conter no máximo 255 caracteres',
            'telefone.required'     => 'O :attribute é obrigatório',
            'telefone.size'         => 'O telefone deve conter 11 dígitos sem pontuação',
            'telefone.unique'       => 'O :attribute informado já está cadastrado',
        ];
    }
}
