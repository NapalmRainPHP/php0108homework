<?php
class Config {
	private function __construct() {
		//protected
	}
	public static function getSettings() {
		return ['host'=>'localhost', 'dbname'=>'homework', 'username'=>'root', 'password'=>''];
	}
}