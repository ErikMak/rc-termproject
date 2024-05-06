<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
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
            ],
            'user_id' => [
                'required',
                'exists:users,id'
            ],
            'text' => [
                'required',
                'regex:/^[a-zA-Zа-яА-Я0-9\s\.,!?()-]{1,500}$/'
            ],
            'rating' => [
                'required',
                'decimal:1'
            ]
        ];
    }
}
