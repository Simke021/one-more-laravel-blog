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
	// Post routes
	Route::get('/post/create', [
		'uses' => 'PostsController@create',
		'as'   => 'post.create'
	]);
	Route::get('/posts', [
		'uses' => 'PostsController@index',
		'as'   => 'posts'
	]);
	Route::post('/post/store', [
		'uses' => 'PostsController@store',
		'as'   => 'post.store'
	]);
	Route::get('/post/edit/{id}', [
		'uses' => 'PostsController@edit',
		'as'   => 'post.edit'
	]);
	Route::get('/post/delete/{id}', [
		'uses' => 'PostsController@destroy',
		'as'   => 'post.delete'
	]);
	Route::get('/posts/trashed', [
		'uses' => 'PostsController@trashed',
		'as'   => 'posts.trashed'
	]);
	Route::get('/posts/kill/{id}', [
		'uses' => 'PostsController@kill',
		'as'   => 'post.kill'
	]);
	// Category routes
	Route::get('/category/create', [
		'uses' => 'CategoriesController@create',
		'as'   => 'category.create'
	]);
	Route::post('/category/store', [
		'uses' => 'CategoriesController@store',
		'as'   => 'category.store'
	]);
	Route::get('/category/edit/{id}', [
		'uses' => 'CategoriesController@edit',
		'as'   => 'category.edit'
	]);
	Route::post('/category/update/{id}', [
		'uses' => 'CategoriesController@update',
		'as'   => 'category.update'
	]);
	Route::get('/category/delete/{id}', [
		'uses' => 'CategoriesController@destroy',
		'as'   => 'category.delete'
	]);
	Route::get('/categories', [
		'uses' => 'CategoriesController@index',
		'as'   => 'categories'
	]);

});

