<?php

class PostsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        // get all posts
        $posts = Post::all();

        $tags = Tag::lists("name", "id");

        $tag = Tag::find(1);

        $photos = $tag->photos()->get();

        // load the view and pass the posts
        return View::make('forms.posts')->with('posts', $posts)->with('tags', $tags)->with('photos', $photos);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
        $post = new Post;
        $post->title = Input::get('title');
        $post->summary = Input::get('summary');
        $post->body = Input::get('body');
        $post->save();
        $post->tags()->sync([Input::get('tag')]);

        // redirect
        return Redirect::to('forms/posts');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
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
