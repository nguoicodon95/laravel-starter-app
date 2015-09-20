<?php

class ListsController extends \BaseController {

	// get all post
	public function index()
	{
		return View::make('pages.list');
	}

}