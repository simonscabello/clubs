<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreTeamsController extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'name' => 'required|min:3|max:20',
            'state' => 'required|min:2|max:2',
            'status' => 'required|integer|digits:1',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Por favor, informe o nome do time.',
            'name.min' => 'Por favor, informe o nome completo do time.',
            'name.max' => 'Por favor, informe apenas o nome principal do time.',
            'state.required' => 'Por favor, informe o estado do time.',
            'state.min.max' => 'Por favor, informe a sigla do estado do time.',
            'status.required' => 'Por favor, informe o status do time.',
            'status.integer' => 'Por favor, informe um número inteiro.',
            'status.digits' => 'Por favor, informe apenas um número'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
