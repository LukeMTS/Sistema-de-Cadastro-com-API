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
            'latitude'    => 'required|between:-90,90',
            'longitude'   => 'required|between:-180,180',
        ];
    }

    public function messages()
    {
        return [
            'logradouro.required' => 'O :attribute é obrigatório',
            'logradouro.max'      => 'O :attribute deve conter no máximo 255 caracteres',
            'numero.required'     => 'O :attribute é obrigatório',
            'numero.integer'      => 'O valor de :attribute deve ser um número válido',
            'complemento.max'     => 'O :attribute deve conter no máximo 255 caracteres',
            'bairro.required'     => 'O :attribute é obrigatório',
            'bairro.max'          => 'O :attribute deve conter no máximo 255 caracteres',
            'cidade.required'     => 'O :attribute é obrigatório',
            'cidade.max'          => 'O telefone deve conter 41 dígitos sem pontuação',
            'estado.required'     => 'O :attribute é obrigatório',
            'estado.max'          => 'O :attribute deve conter 18 dígitos sem pontuação',
            'cep.required'        => 'O :attribute é obrigatório',
            'cep.max'             => 'O :attribute deve conter 8 dígitos sem pontuação',
            'latitude.required'   => 'O :attribute é obrigatório',
            'latitude.between'    => 'A :attribute deve ser um valor entre -90 e 90',
            'longitude.required'  => 'O :attribute é obrigatório',
            'longitude.between'   => 'A :attribute deve ser um valor entre -180 e 180'
        ];
    }
}
