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
            'titulo'=>'required',
            'endereco'=>'required',
            'telefone'=>'required',
            'descricao'=>'required',
            'imagem'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'titulo.required'=>'O campo titulo é obrigatorio.',
            'endereco.required'=>'O campo endereço é obrigatorio.',
            'telefone.required'=>'O campo telefone é obrigatorio.',
            'descricao.required'=>'Você deve selecionar uma descricao do seu Local.',
            'imagem.required'=>'Você deve selecionar uma imagem do seu Local.'
        ];
    }
}
