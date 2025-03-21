<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends BaseRequest
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
            'login.required' => 'Логин не может быть пустым',
            'login.unique' => 'Пользователь с таким логином уже существует',
            'login.string' => 'Логин должен быть строкой',
            'login.regex' => 'Присутствуют недопустимые символы или длина логина превышает 30 символов',
            'password.required' => 'Пароль не может быть пустым',
            'password.string' => 'Пароль должен быть строкой',
            'password.regex' => 'Некорректный пароль',
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
            'login' => [
                'required', 'unique:users,login', 'string',
                'regex:/^[a-zA-Zа-яА-Я0-9\s\-_+]{1,30}$/u'
            ],
            'password' => [
                'required', 'string',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{6,30}$/'
            ]
        ];
    }
}
