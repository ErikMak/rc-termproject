<?php

namespace App\Http\Requests;

class StoreReservationRequest extends BaseRequest
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
            'model_id.required' => 'Не указан ID машины',
            'model_id.exists' => 'Машины с таким ID не существует',
            'equip_id.required' => 'Не указан ID комплектации',
            'equip_id.exists' => 'Комплектации с таким ID не существует',
            'date_issue.required' => 'Не указана дата начала аренды',
            'date_issue.date' => 'Дата начала аренды должна быть выражена строкой, совместимой с функцией strtotime',
            'date_return.required' => 'Не указана дата конца аренды',
            'date_return.date' => 'Дата конца аренды должна быть выражена строкой, совместимой с функцией strtotime',
            'total_cost.required' => 'Не указана итоговая цена',
            'total_cost.numeric' => 'Итоговая цена должна быть числом',
            'total_cost.min' => 'Итоговая цена должна быть положительной',
            'peop_in_car.required' => 'Не указано количество людей в машине',
            'peop_in_car.numeric' => 'Количество людей в машине должно быть числом',
            'peop_in_car.min' => 'Количество людей в машине должно быть не менее 1',
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
            'model_id' => [
                'required',
                'exists:cars,model_id'
            ],
            'peop_in_car' => [
              'required',
              'numeric',
                'min:1'
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
