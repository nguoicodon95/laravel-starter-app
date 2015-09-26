<?php

class AuthController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        // load the view and pass the photos
        return View::make('auth.login');
	}

	// login
	public function login()
	{
		// get user
	    $user = array('username' => Input::get('username'), 
	    			  'password' => Input::get('password'));
	    // check user auth
	    if (Auth::attempt($user)) {
	        return Redirect::to('stream');
	    }    
	    return Redirect::to('stream');
	}

	public function logout()
	{
    	Auth::logout();
    	return Redirect::to('stream');
	}

}