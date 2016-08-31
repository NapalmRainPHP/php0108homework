<?php

/**
 * Created by PhpStorm.
 * User: Nikolay.Alekseev
 * Date: 31.08.2016
 * Time: 15:25
 */
class View {
	public static function render($viewName, $data=NULL) {
		require_once 'templater.php';
		$templater = new Templater($data);
		$result = $templater->parse('default');
	}
}