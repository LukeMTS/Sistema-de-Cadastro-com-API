<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEnderecoRequest extends FormRequest
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
            'cliente_id'  => 'integer',
            'logradouro'  => 'required|max:255',
            'numero'      => 'required|integer',
            'complemento' => 'nullable|max:255',
            'bairro'      => 'required|max:255',
            'cidade'      => 'required|max:41',
            'estado'      => 'required|max:18',
            'cep'         => 'required|max:8',
        ];
    }

    public function messages()
    {
        return [
            'required'        => 'O :attribute é obrigatório',
            'max'             => 'O :attribute deve conter no máximo 255 caracteres',
            'numero.integer'  => 'O valor de :attribute deve ser um número válido',
            'cidade.required' => 'A :attribute é obrigatório',
            'cidade.max'      => 'A :attriute deve conter 41 dígitos sem pontuação',
            'estado.max'      => 'O :attribute deve conter 18 dígitos sem pontuação',
            'cep.max'         => 'O :attribute deve conter 8 dígitos sem pontuação',
        ];
    }
}
