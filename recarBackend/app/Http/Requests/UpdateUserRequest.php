<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function messages(): array
    {
        return [
            'gender.required' => 'Не указан пол',
            'gender.boolean' => 'Пол должен быть булевым типом данных',
            'exp.required' => 'Не указан водительский опыт',
            'exp.numeric' => 'Водительский опыт должен быть числом',
            'exp.min' => 'Водительский опыт не может быть отрицательным',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'gender' => [
                'required',
                'boolean'
            ],
            'exp' => [
                'required',
                'numeric',
                'min:0'
            ]
        ];
    }
}
