
<?php

// @ROUTES
//

// Root
Route::get('/', function() {
    return Redirect::to("stream");
});

// Auth
Route::resource('login', 'AuthController');

// Stream
Route::resource('stream', 'StreamController');

// Post
Route::resource('post', 'PostsController');

// Forms
Route::group(array('prefix' => 'forms'), function()
{
	Route::resource('tag', 'TagsController');
	Route::resource('photo', 'PhotosController');
	Route::resource('post', 'PostsController');
});

// API
Route::group(array('prefix' => 'api/v1'), function()
{
	Route::resource('tag', 'TagsController');
	Route::resource('photo', 'PhotosController');
	Route::resource('post', 'PostsController');
});