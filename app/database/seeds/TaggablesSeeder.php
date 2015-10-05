<?php

class TaggablesSeeder extends Seeder
{
	public function run()
	{
	    DB::table('taggables')->delete();
	    DB::table('taggables')->insert(array(
    		array(
					'tag_id'=> 1,
					'taggable_id' => 1,
					'taggable_type' => 'Tag',
					'created_at'=>date('Y-m-d H:m:s'),
					'updated_at'=>date('Y-m-d H:m:s')
					),
    		array(
					'tag_id'=> 1,
					'taggable_id' => 1,
					'taggable_type' => 'Post',
					'created_at'=>date('Y-m-d H:m:s'),
					'updated_at'=>date('Y-m-d H:m:s')
					),
    		array(
					'tag_id'=> 2,
					'taggable_id' => 2,
					'taggable_type' => 'Tag',
					'created_at'=>date('Y-m-d H:m:s'),
					'updated_at'=>date('Y-m-d H:m:s')
					),
    		array(
					'tag_id'=> 2,
					'taggable_id' => 2,
					'taggable_type' => 'Post',
					'created_at'=>date('Y-m-d H:m:s'),
					'updated_at'=>date('Y-m-d H:m:s')
					),
    		array(
					'tag_id'=> 2,
					'taggable_id' => 3,
					'taggable_type' => 'Post',
					'created_at'=>date('Y-m-d H:m:s'),
					'updated_at'=>date('Y-m-d H:m:s')
					),
		));
	}
}