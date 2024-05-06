<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReservationRequest extends FormRequest
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
            'user_id' => [
                'required',
                'exists:users,id'
            ],
            'model_id' => [
                'required',
                'exists:cars,model_id'
            ],
            'equip_id' => [
                'required',
                'exists:equipment,equip_id'
            ],
            'date_issue' => [
                'required', 'date'
            ],
            'date_return' => [
                'required', 'date'
            ],
            'total_cost' => [
                'required', 'numeric', 'min:0'
            ]
        ];
    }
}
