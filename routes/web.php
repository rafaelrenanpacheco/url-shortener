<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group(['prefix' => 'shorten'], function () {
    Route::get('/', 'ShortenerController@index')->name('shortener.index');
    Route::post('/', 'ShortenerController@generate')->name('shortener.generate');
});

Route::get('/', 'ShortenerController@example')->name('shortener.example');
Route::get('/{url}', 'ShortenerController@redirect')->name('shortener.url');
