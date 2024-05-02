<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['namespace' => 'App\Http\Controllers\Api'], function () {
    // Все машины
    Route::get('cars', 'CarController@index');
    // Поиск машины
    Route::get('cars/find', 'CarController@find');
    // Конкретная машина
    Route::get('cars/{model_id}', 'CarController@show');
    // Комплектации конкретной машины
    Route::get('equipments/{model_id}', 'EquipController@show');
    // Все комплектации
    Route::get('equipments', 'EquipController@index');


    Route::prefix('auth')->group(function () {
        // Регистрация
        Route::post('register', 'AuthController@register');

        // Вход в систему
        Route::post('login', 'AuthController@login');
        // Обновление токена
        Route::get('refresh', 'AuthController@refresh');

        // Маршруты, доступные после авторизации
        Route::middleware('auth:api')->group(function () {
            // Данные пользователя
            Route::get('user', 'AuthController@user');
            // Выход из аккаунта
            Route::get('logout', 'AuthController@logout');
        });
    });
});
