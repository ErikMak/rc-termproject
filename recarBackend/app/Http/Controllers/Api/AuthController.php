<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends BaseController
{
    public function login(Request $request) {
        $data = $request->validate([
                'login' => 'required',
                'password' => 'required'
            ]);

        // Создание токена
        if($token = $this->guard()->attempt($data)) {
            return $this->sendOK()->header('Authorization', $token);
        }

        return $this->sendError('Отказ входа!', 422);
    }

    public function register(Request $request) {
        $data = $request->validate([
           'login' => [
                'required', 'unique:users', 'string',
                'regex:/^(?=.{1,30}$)[a-zA-Z][a-zA-Z0-9]*(?: [a-zA-Z0-9]+)*$/'
           ],
           'password' => [
               'required', 'string',
               'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{6,30}$/'
            ]
        ]);

        $user = User::create([
            'login' => $data['login'],
            'password' => Hash::make($data['password']),
        ]);

        Auth::login($user);

        return $this->sendOK();
    }

    public function logout() {
        Auth::logout();

        return $this->sendOK();
    }

    public function user(Request $request) {
        $user = User::find(Auth::user()->id);

        return $this->sendResponse($user);
    }

    public function refresh() {
        if($token = Auth::refresh()) {
            return $this->sendOK()->header('Authorization', $token);
        }

        return $this->sendError('Ошибка обновления токена авторизации!', 401);
    }

    private function guard()
    {
        return Auth::guard();
    }
}
