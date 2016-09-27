<?php
class indexController extends Controller {
	public function indexAction() {
		$view = new View();
		$data['header'] = 'Домашнее задание 7';
		$view->render('index');
	}
}