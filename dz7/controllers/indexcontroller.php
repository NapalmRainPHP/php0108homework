<?php
class indexController extends Controller {
	public function indexAction() {
		$view = new View();
		$data['header'] = 'Домашнее задание 5';
		$view->render('index');
	}
}