<?php

class Photo extends Eloquent {
	
	protected $table = 'photos';

	public function tags()
    {
        return $this->morphToMany('Tag', 'taggable');
    }

}
