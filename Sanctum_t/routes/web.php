<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/event', function () {
    broadcast(new App\Events\WebsocketDemoEvent('some data'));
    return view('welcome');
});

// Route::get('/chat', 'ChatsController@index');

Route::get('api/messages', 'App\Http\Controllers\ChatsController@fetchMessages');
Route::post('api/messages', 'App\Http\Controllers\ChatsController@sendMessage');
