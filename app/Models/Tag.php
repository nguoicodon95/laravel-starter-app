<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {
	
	protected $table = 'tags';

    public function tags()
    {
        return $this->morphToMany('App\Models\Tag', 'taggable');
    }
    
	public function posts()
    {
        return $this->morphedByMany('App\Models\Post', 'taggable')->with('author')->orderBy('created_at','DESC');
    }

}
