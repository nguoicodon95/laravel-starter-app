<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Message as Message;

class MessagesController extends Controller {

	public function index()
	{
		$message = Message::get();	
		return view('app')->with('message', $message);
	}

}