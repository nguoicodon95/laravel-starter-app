<?php

class InstallHelper {

	public static function checkConnection() {
		$host     = Config::get('settings.host');
		$database = Config::get('settings.database');
		$username = Config::get('settings.username');
		$password = Config::get('settings.password');

		// test connection

	}

}