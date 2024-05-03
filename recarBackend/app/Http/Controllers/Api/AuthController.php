<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends BaseController
{
    public function login(Request $request) {
        $data = $request->only('login', 'password');

        // Создание токена
        if($token = $this->guard()->attempt($data)) {
            return $this->sendOK()->header('Authorization', $token);
        }

        return $this->sendError('Отказ входа!');
    }

    public function register(Request $request) {
        $user = User::create([
            'login' => $request->login,
            'password' => Hash::make($request->password),
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
