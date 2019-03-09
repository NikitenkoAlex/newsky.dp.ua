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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users/{id}', 'HomeController@userEdit')->name('users.edit');
Route::post('/users/{id}', 'HomeController@userSave')->name('users.save');
Route::get('/ajax', 'HomeController@ajax')->name('Ajax');


