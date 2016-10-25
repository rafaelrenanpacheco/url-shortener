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

Route::get('/', ['as' => 'shortener.index', 'uses' => 'ShortenerController@short']);
Route::get('/{url}', ['as' => 'shortener.url', 'uses' => 'ShortenerController@redirect']);
