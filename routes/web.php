<?php

use Illuminate\Support\Facades\Route;
Route::get('/', function () { return view('login'); }); //страница логина
Route::get('/api/auth/v1/', 'App\Http\Controllers\UserController@Api_CheckPassword'); //страница проверки лог+пасс, передать в GET name + password, возращает токен доступа

Route::get('/api/auth/hash/', 'App\Http\Controllers\UserController@Api_CheckHash'); //страница проверки лог+пасс, передать в GET hash, возращает активен или нет

Route::get('/api/auth/get_info/{id}/', 'App\Http\Controllers\UserController@get_user_info'); //взять информацию по пользователю, передать вместо ID номер аккаунта
Route::get('/api/auth/get_users/{limit}/{offset}/', 'App\Http\Controllers\UserController@get_user_all'); //Выгрузить список пользователей, вместо LIMIT и OFFSET написать свои значения
