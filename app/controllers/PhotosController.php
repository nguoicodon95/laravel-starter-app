<?php

class PhotosController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        // get all photos
        $photos = Photo::all();

        $tags = Tag::lists("name", "id");

        // load the view and pass the photos
        return View::make('forms.photos')->with('photos', $photos)->with('tags', $tags);
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
        $photo = new Photo;
		$photo->title = Input::get('title');
		$file = Input::file('photo');
		$dest = "media/photos/".$file->getClientOriginalName();
		$image = Image::make($file);
		$image->resize(600, null, function ($constraint) {
			$constraint->aspectRatio();
		});
		$image->save($dest);
		$photo->url = "/".$dest;
        $photo->description = Input::get('description');
        $photo->save();
        $photo->tags()->sync([Input::get('tag')]);
        return Redirect::to('forms/photos');
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
