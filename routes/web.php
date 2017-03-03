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
	Route::get('check/plagiarism', ['as' => 'getkeywords', 'uses' => 'CheckController@index']);
	Route::post('check/plagiarism', ['as' => 'postkeywords', 'uses' => 'CheckController@ajaxKeywords']);
	Route::get('check/plagiarism/{filename}', 'CheckController@getRemoveFile');


	// User manager
	Route::get('add/user', ['as' => 'getAdd', 'uses' => 'UserController@getAdd']);
	Route::post('add/user', ['as' => 'postAdd', 'uses' => 'UserController@postAdd']);

	//Keywords
	Route::get('keywords', ['as' => 'getkeywords', 'uses' => 'HomeController@getKeywords']);
	Route::post('keywords', ['as' => 'postkeywords', 'uses' => 'HomeController@postKeywords']);

	//File
	Route::get('files', ['as' => 'getInfo', 'uses' => 'FileController@getContentFile']);


	Route::get('logout', 'UserController@logout');
});

	




Route::get('load/db', 'HomeController@loadDB');
