<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClienteRequest extends FormRequest
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
            'cnpj'         => 'required|max:14|cnpj|unique:clientes,cnpj,' . $this->cliente->id,
            'razao_social' => 'required|max:255',
            'nome'         => 'required|max:255',
            'telefone'     => 'required|max:14|celular_com_ddd|unique:clientes,telefone,' . $this->cliente->id,
        ];
    }

    public function messages()
    {
        return [
            'required'              => 'O :attribute é obrigatório',
            'unique'                => 'O :attribute informado já consta como cadastrado',
            'cnpj.max'              => 'O :attribute deve conter 14 dígitos sem pontuação',
            'telefone.max'          => 'O :attribute deve conter 14 dígitos com pontuação',
            'razao_social.required' => 'A razão social é obrigatório',
            'razao_social.max'      => 'A :attribute deve conter no máximo 255 caracteres',
            'nome.max'              => 'O :attribute deve conter no máximo 255 caracteres',
        ];
    }
}
