<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model {
	
	protected $table = 'photos';

	public function tags()
    {
        return $this->morphToMany('App\Tag', 'taggable');
    }

}
