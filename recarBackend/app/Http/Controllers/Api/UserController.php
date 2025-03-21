<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class UserController extends BaseController
{
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request) : JsonResponse
    {
        $validated = $request->validated();

        $user = Auth::user();

        $user->exp = $validated['exp'];
        $user->gender = $validated['gender'];

        $user->save();

        return $this->sendResponse(new UserResource($user), 'Данные водителя обновлены!');
    }
}
