<?php

class UsersSeeder extends Seeder
{
	public function run()
	{
	    DB::table('users')->delete();
	    DB::table('users')->insert(array(
				'username'=>'jamess.developer@gmail.com',
				'password' => Hash::make('secret'),
				'created_at'=>date('Y-m-d H:m:s'),
				'updated_at'=>date('Y-m-d H:m:s')
				));
	}
}