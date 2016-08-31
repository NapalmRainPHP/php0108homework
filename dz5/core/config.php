<?php

/**
 * Created by PhpStorm.
 * User: Nikolay.Alekseev
 * Date: 31.08.2016
 * Time: 12:05
 */
class Config {
	private function __construct() {
		//protected
	}
	public static function getSettings() {
		return ['host'=>'localhost', 'dbname'=>'homework', 'username'=>'root', 'password'=>''];
	}
}