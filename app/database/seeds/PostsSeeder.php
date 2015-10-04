<?php

class PostsSeeder extends Seeder
{
	public function run()
	{
	    DB::table('users')->delete();
	    DB::table('users')->insert(array(
    		array(
					'username'=>'jamess.developer@gmail.com',
					'password' => Hash::make('secret'),
					'is_admin' => 1,
					'remember_token' => 'cdHoby5h1YjxjDziFXk6OHp6p7etk8l5sdLKWB9Lfwn1rxUSuasDv7RlatMR',
					'created_at'=>date('Y-m-d H:m:s'),
					'updated_at'=>date('Y-m-d H:m:s')
					),
    		array(
					'username'=>'test1@gmail.com',
					'password' => Hash::make('secret'),
					'is_admin' => 0,
					'remember_token' => 'cdHoby5h1YjxjDziFXk6OHp6p7etk8l5sdLKWB9Lfwn1rxUSuasDv7RlatMR',
					'created_at'=>date('Y-m-d H:m:s'),
					'updated_at'=>date('Y-m-d H:m:s')
					),
    		array(
					'username'=>'test2@@gmail.com',
					'password' => Hash::make('secret'),
					'is_admin' => 0,
					'remember_token' => 'cdHoby5h1YjxjDziFXk6OHp6p7etk8l5sdLKWB9Lfwn1rxUSuasDv7RlatMR',
					'created_at'=>date('Y-m-d H:m:s'),
					'updated_at'=>date('Y-m-d H:m:s')
					),
		));
	}
}