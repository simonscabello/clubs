<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreStateController extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'state' => 'required|string|min:3|max:50',
        ];
    }

    public function messages(): array
    {
        return [
            'state.required' => 'Por favor, informe o estado.',
            'state.string' => 'Por favor, verifique o nome do estado.',
            'state.min' => 'Por favor, verifique o nome do estado.',
            'state.max' => 'Por favor, verifique o nome do estado.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
