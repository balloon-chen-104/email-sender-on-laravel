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
    return view('welcome');
});

// 參考資料
// https://jsnwork.kiiuo.com/archives/2917/php-laravel-透過-gmail-發送-e-mail-信件/
// https://jsnwork.kiiuo.com/archives/2917/php-laravel-%E9%80%8F%E9%81%8E-gmail-%E7%99%BC%E9%80%81-e-mail-%E4%BF%A1%E4%BB%B6/
Route::get('/email', 'EmailSenderController@form');
Route::post('/send', 'EmailSenderController@send');
