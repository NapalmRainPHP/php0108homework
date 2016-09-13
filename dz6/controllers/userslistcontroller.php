<?php

class userslistController extends Controller {
	public function indexAction() {
		$view = new View();
		require_once 'models/users.php';
		require_once 'models/profiles.php';
		$profiles = new Profiles();
		$users = new Users();
		$ulist = $profiles->getAllOrder(NULL, 'age');

		for($i = 0; $i<count($ulist); $i++) {
			$ulist[$i]['user'] = $users->getByID($ulist[$i]['user']);
		}

		$view->render('userslist', ['list'=>$ulist]);
	}
}