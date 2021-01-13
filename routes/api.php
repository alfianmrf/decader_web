<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1'], function () {
    Route::post('/login', 'App\Http\Controllers\API\UserController@login');
    Route::post('/register', 'App\Http\Controllers\API\UserController@register');
    Route::get('/logout', 'App\Http\Controllers\API\UserController@logout')->middleware('auth:api');
    Route::post('/create', 'App\Http\Controllers\API\SaveController@create')->middleware('auth:api');
    Route::get('/read', 'App\Http\Controllers\API\SaveController@read')->middleware('auth:api');
    Route::post('/update', 'App\Http\Controllers\API\SaveController@update')->middleware('auth:api');
    Route::post('/delete', 'App\Http\Controllers\API\SaveController@delete')->middleware('auth:api');
    Route::post('/save', 'App\Http\Controllers\API\SaveController@save')->middleware('auth:api');
});