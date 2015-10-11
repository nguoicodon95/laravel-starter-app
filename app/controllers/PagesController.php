<?php

class PagesController extends \BaseController {

	public function pricing()
	{
        return View::make('pages.pricing');
	}

	public function funding()
	{
        return View::make('pages.funding');
	}

}