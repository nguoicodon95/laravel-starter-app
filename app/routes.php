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

// Artisan commands
// Route::group(array('before'=>'auth|admin'), function() {
Route::get('/stream/reset/{key?}',  array('as' => 'resetdb', function($key = null)
{
    if($key == "reset123") {
		try {
			// delete tables here
			echo "reset migration";
			Artisan::call("migrate:reset", array('--force' => true));
			echo "<br />start migration";
			Artisan::call("migrate", array("--path"=>"app/database/migrations", "--force" => true));
			echo "<br />init db seeding";
			Artisan::call('db:seed', array('--force' => true));
			echo "<br />done";
	    } catch (Exception $e) {
			Response::make($e->getMessage(), 500);
	    }
  } else {
    App::abort(404);
  }
}));
// });