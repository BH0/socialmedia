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

// Note: Route protection may not have been done correctly 

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

// this is here due to what appears to be a glithc 
//Route::post('/login', [
 //   'uses' => 'UserController@postSignin',
 //   'as' => 'login'
//]);

Route::get('/signout', [
	'uses' => 'UserController@getSignout', 
	'as' => 'signout' 
]); 

Route::get('/account', [
	'uses' => 'UserController@getAccount', 
	'as' => 'account'
]); 

route::post('/updateAccount', [
	'uses' => 'UserController@postUpdateAccount', 
	'as' => 'account.update' 
]); 

Route::get('/userImage/{filename}', [ 
	'uses' => 'UserController@getUserImage', 
	'as' => 'account.image' 
]); 

Route::get('/dashboard', [
	'uses' => 'PostController@getDashboard', 
	'as' => 'dashboard',  
	'middleware' => 'auth' 
]); 

Route::post('/post', [ 
	'uses' => 'PostController@postCreatePost', 
	'as' => 'post.create' 
]); 

Route::get('/post-delete/{post_id}', [
	'uses' => 'PostController@getDeletePost', 
	'as' => 'post.delete', 
	'middleware' => 'auth' 
]);  