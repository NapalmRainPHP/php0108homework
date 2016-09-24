<?php

/**
 * Created by PhpStorm.
 * User: Varius
 * Date: 24.09.2016
 * Time: 10:55
 */
class uploadimageController extends Controller {
	public function indexAction() {
		$view = new View();
		$view->render('uploadimage');
	}
}