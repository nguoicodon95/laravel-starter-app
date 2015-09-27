<?php

// @ROUTES
//

// Root
Route::get('/', function() {
    return Redirect::to("stream");
});

// Stream
Route::resource('stream', 'StreamController');

// Login
Route::post('login', 'AuthController@login');
Route::get('logout', 'AuthController@logout');
Route::resource('loginbox', 'AuthController');

// User
Route::group(array('before'=>'auth|admin'), function() {
	Route::resource('user', 'UsersController');
	Route::resource('post', 'PostsController');
	// New Tag
	Route::post('stream/newtag', 'StreamController@newtag');
});

// Post
Route::resource('post', 'PostsController', ['only' => ['index', 'show']]);

// Forms
Route::group(array('prefix' => 'forms'), function() {
	Route::resource('tag', 'TagsController');
	Route::resource('photo', 'PhotosController');
	Route::resource('post', 'PostsController');
});

// API
Route::group(array('prefix' => 'api/v1'), function() {
	Route::resource('tag', 'TagsController');
	Route::resource('photo', 'PhotosController');
	Route::resource('post', 'PostsController');
});