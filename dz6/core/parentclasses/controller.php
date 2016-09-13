<?php
class Controller {
	public function indexAction() {
		$view = new View();
		$view->render('index');
	}
}