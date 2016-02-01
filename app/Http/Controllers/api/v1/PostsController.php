<?php

namespace App\http\Controllers\api\v1;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Photo;
use Auth;
use Image;

class PostsController extends Controller {

	public function index()
	{
		$posts = Post::orderBy('id', 'DESC')->with('tags')->with('author')->take(7)->get();
        return \Response::json($posts);	
	}
	
	public function store()
	{	
		$data = \Request::json()->all();
		$result = "";
        /*
		$saveid = "";
		if($data["streamname"] === "0" && $data["streamid"] === "0") {	
			$result = false;
		} else {		
			$result = true;
			// no stream id
			if($data["streamid"] === "0") {
				// create new tag
				$tag = new Tag;
				$tag->name = $data["streamname"];
				$tag->user_id = $data["userId"];
				$tag->save();
				$tag->tags()->sync([$tag->id]);
				$saveid = $tag->id;
			}
			// pass right tag id
			if($data["streamid"] != "0") {
				$saveid = $data["streamid"];
			}
			// create new post
			$post = new Post;
			$post->title = $data["title"];
			$post->body = $data["body"];
			$post->user_id = $data["userId"];
			$post->save();
			$post->tags()->sync([$saveid]);
		}
        */
        
        /*
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
        */
        
        $photo = new Photo;
        
        $file = \Input::file('file');
        
        $fileName = "media/photos/large/" . $file->getClientOriginalName();
        
        $makeFile = Image::make($file);
        
		$makeFile->resize(600, null, function ($constraint) {
			$constraint->aspectRatio();
		});
        
        $makeFile->save($fileName);
        
        $photo->url = $fileName;
        $photo->save();
        
        $result = "success";
        
        // redirect
        return \Response::json(array("success"=>$result));
	}
    
    // store + upload files
    public function upload() {
        
    }
	
	public function show($id)
	{
		$posts = Post::with('tags')->where('id', '=', $id)->with('author')->get();
        return \Response::json($posts);
	}
	
	public function update($id)
	{
		$data = \Request::json()->all();	
		$result = "false";	
		$post = Post::find($id);
		$post->title = $data["title"];
        $post->body = $data["body"];	
		if(Auth::id() === $data["userId"]) {
			$post->save();
			$result = "true";
		}	
		return \Response::json(array("success"=>$result));
	}

}