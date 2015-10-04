<?php

class PostsSeeder extends Seeder
{
	public function run()
	{
	    DB::table('posts')->delete();
	    DB::table('posts')->insert(array(
    		array(
					'title'=>'About Puff Stream',
					'body' => 'Puff Stream has been established in one of three ways - a personal project, a publication stream and development for the Stream Software.',
					'created_at'=>date('Y-m-d H:m:s'),
					'updated_at'=>date('Y-m-d H:m:s')
					),
    		array(
					'title'=>'About Stream',
					'body' => 'Stream is a FREE Open Source Software, features include add a post, add photos, add web links etc..',
					'created_at'=>date('Y-m-d H:m:s'),
					'updated_at'=>date('Y-m-d H:m:s')
					),
    		array(
					'title'=>'Use Gimp',
					'body' => 'Use Gimp to group a series of related products together, example, tee, shorts and shoes. Or maybe use it to try and explain something quite complicated, like a philosophical statement.',
					'created_at'=>date('Y-m-d H:m:s'),
					'updated_at'=>date('Y-m-d H:m:s')
					),
		));
	}
}