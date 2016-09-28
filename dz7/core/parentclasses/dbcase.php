<?php
class DBCase {
	private function __construct() {
		//protected
	}

	public static function connect() {
		$configs = Config::getSettings();
		//return @mysqli_connect($configs['host'], $configs['username'], $configs['password'], $configs['dbname']);
	}
}