<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlunoRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            // 'codigo'=> "bail|max:30|min:6|required|unique:alunos,codigo,$this->id",
            'codigo'=> "bail|max:30|min:6|required",
            'nome'=> "bail|required|max:250|min:3",
            'email'=> "bail|required|max:200|min:10",
         ];
    }


    public function messages(): array
    {
        return [
            'codigo.required' => 'campo código é obrigatorio',
            'codigo.unique' => 'o código deve ser único',
            'codigo.min' => 'mínimo de 6 caracteres no código',
            'codigo.max' => 'máximo de 30 caracteres no código',

            'nome.required' => 'campo nome é obrigatorio',
            'nome.min' => 'mínimo de 3 caracteres no nome',
            'nome.max' => 'máximo de 250 caracteres no código',

            'email.required' => 'campo email é obrigatorio',
            'email.unique' => 'o endereço de email deve ser único',
            'email.min' => 'mínimo de 10 caracteres no email',
            'email.max' => 'máximo de 200 caracteres no email',
        ];
    }


}
