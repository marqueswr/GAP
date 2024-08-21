<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentoRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
           'descricao'=> 'required|unique:documentos,descricao,except,id|max:100|min:2',
        ];
    }

    public function messages(): array
    {
        return [
            'descricao.required' => 'campo descrição é obrigatorio',
            'descricao.unique' => 'o nome deve ser único',
            'descricao.min' => 'mínimo de 2 caracteres',
            'descricao.max' => 'máximo de 100 caracteres',
        ];
    }
}
