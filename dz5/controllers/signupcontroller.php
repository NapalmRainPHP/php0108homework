<?php
class signupController extends Controller {
	public function indexAction() {
		$view = new View();
		$view->render('signup');
	}
}