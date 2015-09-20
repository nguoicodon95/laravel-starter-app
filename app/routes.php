
<?php

// @ROUTES
//

// root
Route::get('/', function() {
    return Redirect::to("stream");
});

Route::resource('stream', 'ListsController');

// Forms
Route::group(array('prefix' => 'forms'), function()
{
	Route::resource('tags', 'TagsController');
	Route::resource('photos', 'PhotosController');
	Route::resource('posts', 'PostsController');
});

// API
Route::group(array('prefix' => 'api/v1'), function()
{
	Route::resource('tags', 'TagsController');
	Route::resource('photos', 'PhotosController');
	Route::resource('posts', 'PostsController');
});