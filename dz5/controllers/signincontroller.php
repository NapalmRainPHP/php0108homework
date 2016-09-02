<?php
class signinController extends Controller {
	public function indexAction() {
		$view = new View();
		$view->render('signin');
	}
}