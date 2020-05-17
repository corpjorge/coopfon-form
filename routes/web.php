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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');



Route::group(['middleware' => 'auth'], function () {
    Route::resource('form', 'FormController');
    Route::get('table/', 'TableController@index')->name('table');
    Route::get('table/{table}', 'TableController@show');
    Route::get('table/{table}/export', 'TableController@export');
    Route::post('table/{table}/{id}', 'TableController@update');

    /*Route::get('/ahorros', 'AhorroController@index')->name('ahorros');  
    Route::get('/ahorros/create', 'AhorroController@create')->name('ahorros.create');
    Route::post('/ahorros', 'AhorroController@store')->name('ahorros.store');  
    Route::put('/ahorros/{ahorro}', 'AhorroController@update')->name('ahorros.update');*/

    Route::resource('ahorros', 'AhorroController');

	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

