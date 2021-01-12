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

Route::get('/', function () {
    broadcast(new App\Events\WebsocketDemoEvent('some data'));
    return view('welcome');
});

// Route::get('/chat', 'ChatsController@index');
// Route::get('/messages', 'ChatsController@fetchMessages');