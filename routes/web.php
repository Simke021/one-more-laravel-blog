<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
	Route::get('/home', [
		'uses' => 'HomeController@index',
		'as'   => 'home'
	]);
	Route::get('/post/create', [
		'uses' => 'PostsController@create',
		'as'   => 'post.create'
	]);
	Route::post('/post/store', [
		'uses' => 'PostsController@store',
		'as'   => 'post.store'
	]);
});

