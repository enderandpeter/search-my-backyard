<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('search-my-backyard', function () {
	return view('search-my-backyard');
});

Route::post('search-my-backyard', ['uses' => 'LocationDataController@postLocation', 'as' => 'postLocation']);

Route::get('frogger', function () {
	return view('frogger');
});