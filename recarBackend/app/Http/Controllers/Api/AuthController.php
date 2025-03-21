<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\RegisterUserRequest;
use App\Http\Resources\User\UserResource;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends BaseController
{
    public function login(Request $request) : JsonResponse {
        $data = $request->validate([
                'login' => 'required',
                'password' => 'required'
            ]);

        // Создание токена
        if($token = $this->guard()->attempt($data)) {
            return $this->sendOK()->header('Authorization', $token);
        }

        return $this->sendError('Неправильный логин или пароль!');
    }

    public function register(RegisterUserRequest $request) : JsonResponse {
        $data = $request->validated();

        $user = User::create([
            'login' => $data['login'],
            'password' => Hash::make($data['password']),
        ]);

        $user->assignRole('user');

        Auth::login($user);

        return $this->sendOK();
    }

    public function logout() {
        Auth::logout();

        return $this->sendOK();
    }

    public function user() : JsonResponse {
        $user = User::find(Auth::user()->id);

        return $this->sendResponse(new UserResource($user));
    }

    public function admin() : JsonResponse {
        $user = User::find(Auth::user()->id);

        if($user->hasRole('admin')) {
            return $this->sendResponse(new UserResource($user));
        } else {
            return $this->sendError('Locked', 423);
        }
    }

    public function refresh() : JsonResponse {
        if($token = Auth::refresh()) {
            return $this->sendOK()->header('Authorization', $token);
        }

        return $this->sendError('Ошибка обновления токена авторизации!');
    }

    private function guard() : StatefulGuard
    {
        return Auth::guard();
    }
}
