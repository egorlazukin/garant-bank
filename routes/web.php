<?php

use Illuminate\Support\Facades\Route;
Route::get('/', function () { return view('login'); }); //страница логина
Route::get('/api/auth/v1/', 'App\Http\Controllers\UserController@Api_CheckPassword'); //страница проверки лог+пасс, передать в GET name + password, возращает токен доступа

Route::get('/api/auth/hash/', 'App\Http\Controllers\UserController@Api_CheckHash'); //страница проверки лог+пасс, передать в GET hash, возращает активен или нет

Route::get('/api/auth/get_info/{id}/', 'App\Http\Controllers\UserController@get_user_info'); //взять информацию по пользователю, передать вместо ID номер аккаунта
Route::get('/api/auth/get_users/{limit}/{offset}/', 'App\Http\Controllers\UserController@get_user_all'); //Выгрузить список пользователей, вместо LIMIT и OFFSET написать свои значения
Route::get('/account/{id}/',function () { return view('profile'); }); //Вывести аккаунт, передать ID пользователя.
Route::get('/api/deal/info_profile/{id}', 'App\Http\Controllers\DealController@getUserInfo'); //страница получения всех сделок, передать ID пользователя.
Route::get('/api/user/Get_Full_name/{id}', 'App\Http\Controllers\UserController@getUserInfo'); //страница проверки лог+пасс, передать в GET name + password, возращает токен доступа
Route::get('/api/deal/all/{hash}/', 'App\Http\Controllers\DealController@getAllDeal'); //страница запроса всех сделок, передать hash пользователя
Route::get('/api/deal/get/{hash}/{id_status}', 'App\Http\Controllers\DealController@get_TypeDeal1'); //страница запроса всех сделок, передать hash пользователя

Route::get('/api/company/create/', 'App\Http\Controllers\CompanyController@CreateNewCompany'); //Add new company (name_company, inn_company)
Route::get('/api/company/info/', 'App\Http\Controllers\CompanyController@get_info_company'); //Check company (name_company, inn_company)
Route::get('/api/company/info/{id}', 'App\Http\Controllers\CompanyController@get_info_company_id'); //Get Info Company 
Route::get('/api/company/sears/', 'App\Http\Controllers\CompanyController@SearsCompany'); //Sears Company 
Route::get('/company/{id}/', function () { return view('company'); }); //Public page