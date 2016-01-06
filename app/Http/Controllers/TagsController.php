<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Tag as Tag;

class TagsController extends Controller {

	public function show($id)
	{
		$tags = Tag::where("id","=",$id)->orderBy('id', 'DESC')->with('posts')->get();		
		return view('pages.tags')->with('tags', $tags);
	}
	
	public function editTags() {
		$tags = Tag::orderBy('id', 'DESC')->with('posts')->get();	
		return view('edit.tags')->with('tags', $tags);
	}
	
	public function tagName($name)
	{
		$Tag = Tag::where('name','like','%'.$name.'%')
			->orderBy('id','DESC')
			->take(5)
			->with('posts')
			->get(array('id', 'name', 'user_id'));
			
		return view('pages.tags')->with('tags', $Tag);
 
	}

}