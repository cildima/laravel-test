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

Route::prefix('news')->group(function () {
    Route::get('edit/{id}', 'NewsController@edit')->name('edit_news')->middleware('auth');
    Route::post('save', 'NewsController@save')
        ->name('save_news')->middleware('auth');
});
