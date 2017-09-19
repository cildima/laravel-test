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
    Route::get('add', function() {
        return view('news.add');
    })->name('add_news')->middleware('auth');
    Route::post('save', 'NewsController@save')
        ->name('save_news')->middleware('auth');
});
