<?php

class Tag extends Eloquent {
	
	protected $table = 'tags';

    public function tags()
    {
        return $this->morphToMany('Tag', 'taggable');
    }
    
	public function posts()
    {
        return $this->morphedByMany('Post', 'taggable');
    }

	public function photos()
    {
        return $this->morphedByMany('Photo', 'taggable');
    }

}
