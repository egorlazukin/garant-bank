<?php

use Illuminate\Support\Facades\Route;
Route::get('/', function () { return view('login'); });

Route::get('/api/auth/v1/', 'App\Http\Controllers\UserController@Api_CheckPassword');
Route::get('/api/auth/hash/', 'App\Http\Controllers\UserController@Api_CheckHash');

//Route::get('/cheked/', 'App\Http\Controllers\UserController@Api_CheckPassword');


//Ошибки не правильных запросов