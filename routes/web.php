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
})->name('home');

Route::post('/signup', [
    'uses' => 'UserController@postSignup',
    'as' => 'signup'
]);

Route::post('/signin', [
    'uses' => 'UserController@postSignin',
    'as' => 'signin'
]);

Route::get('/dashboard', [
	'uses' => 'UserController@getDashboard', 
	'as' => 'dashboard' 
]); 

/* 
Route::group(['middleware' => ['web']], function() {
	
	Route::get('/', function() {
		return view('welcome'); 
	}); 

	Route::post('/signup', [
		'uses' => 'UserController@postSignup', 
		'as' => 'signup'
	]); 

	Route::get('/dashboard', [
		'uses' => 'UserControlle@getDashboard', 
		'as' => 'dashboard' 
	]); 
}); 
*/ 