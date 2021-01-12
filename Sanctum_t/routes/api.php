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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post('auth/login', 'App\Http\Controllers\API\AuthController@login');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('auth/user', 'App\Http\Controllers\API\AuthController@user');
    Route::post('auth/logout', 'App\Http\Controllers\API\AuthController@logout');
});

Route::post('auth/logout', 'App\Http\Controllers\API\AuthController@logout');