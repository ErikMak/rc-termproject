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
});
