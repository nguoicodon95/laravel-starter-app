<?php

class AuthController extends \BaseController {

	public function redirect() {
		return Redirect::to("stream");
	}

	public function login()
	{
	    $msg_1 = Config::get('settings.messages.loggedIn');
	    $msg_2 = Config::get('settings.messages.incorrect');

	    $user = array('username' => Input::get('username'), 'password' => Input::get('password'));
	    if (Auth::attempt($user)) {
	        return Redirect::to('stream')->with('flash_notice', $msg_1);
	    }
	    
	    return Redirect::to('stream')->with('flash_error', $msg_2)->withInput();
	}

	public function logout()
	{
		$msg = Config::get('settings.messages.loggedOut');;
    	Auth::logout();
    	return Redirect::to('stream')->with('flash_notice', $msg);
	}

	// edit user
	public function edituser($id) {
		$user = StreamUser::find($id);
		$user->username = Input::get('editUsername');
		$password = Input::get('editPassword');
		if(isset($password) && $password != "") {
			$user->password = Hash::make($password);
		}
		$user->save();
		return Redirect::to('stream');
	}

}