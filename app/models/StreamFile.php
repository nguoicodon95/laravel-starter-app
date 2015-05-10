<?php

class StreamFile extends Eloquent {
	
	protected $table = 'StreamFile';

	public function post() {
		return $this->belongsTo('StreamPost', 'id');
	}

}
