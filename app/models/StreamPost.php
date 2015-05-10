<?php

class StreamPost extends Eloquent {
	
	protected $table = 'StreamPost';
	
	public function file() {
		return $this->hasMany('StreamFile', 'post_id', 'id');
	}

}
