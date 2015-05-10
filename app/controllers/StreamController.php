<?php

class StreamController extends \BaseController {

	// get all post
	public function index()
	{
        $sp = StreamPost::with("file")->orderBy('created_at', 'DESC')->get();
		return View::make('pages.list')->with("post", $sp);
	}

	// get post by id
	public function detail($id)
	{
		$sp = StreamPost::with("file")->where('id', '=', $id)->get();
		return View::make('pages.detail')->with('post', $sp);
	}

	// save post
	public function store()
	{
		$msg = Config::get('settings.messages.successfulPost');
        $sp = new StreamPost;
		$sp->title = Input::get('title');
        $sp->post = Input::get('post');
        $sp->save();
        $fileAvail = Input::hasFile('file');
        if($fileAvail) {
	        $file = Input::file('file');
        	FileHelper::saveFile($file); 
        }   
        Session::flash('message', $msg);
        return Redirect::to('stream');
	}

	// edit post
	public function edit($id)
	{
		$sp = StreamPost::with("file")->where('id', '=', $id)->get();
		return View::make('pages.edit')->with('post', $sp);
	}

	// edit post
	public function update($id) {
		$sp = StreamPost::find($id);
		$sp->title = Input::get('title');
        $sp->post = Input::get('post');
        $sp->save();
        $fileAvail = Input::hasFile('file2');
        if($fileAvail) {
	        $file = Input::file('file2');
        	FileHelper::updateFile($file, $id);
        }
		return Redirect::to('stream');
	}

	// delete post
	public function destroy($id) {
		$sp = StreamPost::where('id', '=', $id);
		$image = Input::get('picture');
		$handleDelete = FileHelper::deleteFile($image);
		$sp->delete();
		return Redirect::to('stream');
	}

	// delete image
	public function deleteimage($id) {
		$image = Input::get('picture');
		$handleDelete = FileHelper::deleteFile($image);
		return Redirect::to('/edit/'.$id);
	}

	/*

	Examples:

	Referencing a method inside of a controller

	routes //

	Route::get('testA', 'StreamController@testA');
	Route::get('testB', 'StreamController@testB');

	methods //

	public function testA() {
		$testB = $this->testB();
		return "testA + " . $testB;
	}

	public function testB() {
		return "testB";
	}

	Dump object to view

	var_dump(object);
	
	*/

}