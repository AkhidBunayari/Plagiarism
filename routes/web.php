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





Route::get('login', ['as' => 'login', 'uses' => 'UserController@index']);
Route::post('login', ['as' => 'postLogin', 'uses' => 'UserController@postLogin']);


Route::group(['prefix' => '/', 'middleware' => 'loginSystem'], function() {
	Route::get('upload/keywords', ['as' => 'getkeywords', 'uses' => 'keywordController@index']);
	Route::post('upload/keywords', ['as' => 'postkeywords', 'uses' => 'keywordController@ajaxKeywords']);
	Route::get('upload/keywords/{filename}', 'keywordController@getRemoveFile');


	// User manager
	Route::get('add/user', ['as' => 'getAdd', 'uses' => 'UserController@getAdd']);
	Route::post('add/user', ['as' => 'postAdd', 'uses' => 'UserController@postAdd']);

	Route::get('logout', 'UserController@logout');
});

	




Route::get('load/db', 'HomeController@loadDB');
