<?php

class AuthController extends \BaseController {

	public function index()
	{
		return View::make('auth.login');
	}

}