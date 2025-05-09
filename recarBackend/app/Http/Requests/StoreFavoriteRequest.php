<?php

namespace App\Http\Requests;

class StoreFavoriteRequest extends BaseRequest
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
            'car_id.required' => 'Не указан ID машины',
            'car_id.exists' => 'Машины с таким ID не существует',
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
            'car_id' => [
                'required',
                'exists:cars,model_id'
            ]
        ];
    }
}
