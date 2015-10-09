<?php

class StreamController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		$posts = Post::orderBy('id', 'DESC')->get();
        return View::make('pages.stream')->with('posts', $posts);

	}

	// new tag
	public function newtag() {
		$newtag = Input::get('newtag');
		Session::flash('newtag', $newtag);     
		return Redirect::to('/stream/create');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('edit.add-stream');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// store tag
        $tag = new Tag;
        $tag->name = Input::get('name');
        $tag->save();
        $tag->tags()->sync([$tag->id]);

        // store post
        $post = new Post;
        $post->title = Input::get('title');
        $post->body = Input::get('body');
        $post->save();
        $post->tags()->sync([$tag->id]);

        // redirect
        return Redirect::to('stream');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{

	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
