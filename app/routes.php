<?php

// @ROUTES
//

// root
Route::get('/', function() {
    // test for connection here
    return Redirect::to("stream");
});

// @RESOURCE
//
// StreamController

// list
Route::resource('stream', 'StreamController');

// detail
Route::get('detail/{id}', 'StreamController@detail');

// edit
Route::get('edit/{id}', 'StreamController@edit')->before('auth');

// delete
Route::post('deleteimage/{id}', 'StreamController@deleteimage')->before('auth');

// #

// @RESOURCE
//
// AuthController

// auth
Route::resource('auth', 'authController');

// login
Route::get('login', 'AuthController@redirect');

// login
Route::post('login', 'AuthController@login');

// logout
Route::get('logout', 'AuthController@logout');

// edit user
Route::post('edituser/{id}', 'AuthController@edituser')->before('auth');