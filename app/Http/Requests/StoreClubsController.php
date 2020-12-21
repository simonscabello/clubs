<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreClubsController extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'name' => 'required|min:3|max:20',
            'id_state' => 'required|numeric|digits:1'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Por favor, informe o nome do time.',
            'name.min' => 'Por favor, informe o nome completo do time.',
            'name.max' => 'Por favor, informe apenas o nome principal do time.',
            'id_state.required' => 'Por favor, insira o ID do estado.',
            'id_state.numeric' => 'Por favor, o ID do estado deve ser um número.',
            'id_state.digits' => 'Por favor, informe apenas um número.'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
