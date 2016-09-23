<?php

/**
 * Created by PhpStorm.
 * User: Nikolay.Alekseev
 * Date: 23.09.2016
 * Time: 15:44
 */
class fileuploadController extends Controller {
	public function indexAction() {
		$view = new View();
		$view->render('fileupload');
	}
}