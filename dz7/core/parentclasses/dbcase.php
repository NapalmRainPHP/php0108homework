<?php

/**
 * Created by PhpStorm.
 * User: Nikolay.Alekseev
 * Date: 31.08.2016
 * Time: 11:58
 */

class DBCase {
	private function __construct() {
		//protected
	}

	public static function connect() {
		$configs = Config::getSettings();
		//return @mysqli_connect($configs['host'], $configs['username'], $configs['password'], $configs['dbname']);
	}
}