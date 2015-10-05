<?php

class TagsSeeder extends Seeder
{
	public function run()
	{
	    DB::table('tags')->delete();
	    DB::table('tags')->insert(array(
    		array(
					'name'=>'puffstream',
					'created_at'=>date('Y-m-d H:m:s'),
					'updated_at'=>date('Y-m-d H:m:s')
					),
    		array(
					'name'=>'stream',
					'created_at'=>date('Y-m-d H:m:s'),
					'updated_at'=>date('Y-m-d H:m:s')
					)
		));
	}
}