<?php

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

Route::get('/make/request', 'RequestController@create')->name('make_request');
Route::post('/save/request', 'RequestController@store')->name('save_request');
Route::get('/all/request', 'RequestController@index')->name('all_requests');

Route::view('/admin', 'auth.login');
Route::post('login', 'AuthController@login')->name('login');
Route::get('logout', 'AuthController@logout')->name('logout');

Route::view('dashboard', 'auth.dashboard')->name('dashboard');
Route::get('/manage/currencies', 'CurrencyController@index')->name('manage_currencies');
Route::get('/create/currency', 'CurrencyController@create')->name('create_currency');
Route::post('/save/currency', 'CurrencyController@store')->name('save_currency');

Route::get('/edit/currency/{id}', 'CurrencyController@edit')->name('edit_currency');
Route::post('/edit/currency/{id}', 'CurrencyController@update')->name('update_currency');
Route::get('/delete/currency/{id}', 'CurrencyController@delete')->name('delete_currency');
