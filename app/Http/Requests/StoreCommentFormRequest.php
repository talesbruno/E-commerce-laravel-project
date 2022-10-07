<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommentFormRequest extends FormRequest
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
            'nome'=>'required',
            'preco'=>'required',
            'quantidade'=>'required',
            'descricao'=>'required',
            'imagem'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'nome.required'=>'O campo nome é obrigatorio.',
            'preco.required'=>'O campo endereço é obrigatorio.',
            'quantidade.required'=>'O campo telefone é obrigatorio.',
            'descricao.required'=>'Você deve selecionar uma descricao do seu Local.',
            'imagem.required'=>'Você deve selecionar uma imagem do seu Local.'
        ];
    }
}
