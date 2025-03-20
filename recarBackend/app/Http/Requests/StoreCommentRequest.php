<?php

namespace App\Http\Requests;

class StoreCommentRequest extends BaseRequest
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
            'car_id.required' => 'ID машины не может быть пустым',
            'car_id.exists' => 'Машины с таким ID не существует',
            'text.required' => 'Текст комментария не может быть пустым',
            'text.regex' => 'Присутствуют недопустимые символы или длина комментария превышает 500 символов',
            'rating.required' => 'Не указана оценка',
            'rating.decimal' => 'Оценка должна быть числом с плавающей точкой и одним знаком после запятой'
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
