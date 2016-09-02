<?php

class filelistsController extends Controller {
	public function indexAction() {
		$view = new View();
		$list = NULL;
		if (isset($_POST['username'])) {
			require_once 'models/users.php';
			$users = new Users();
			$ud = $users->getByAttributes(['login'=>$_POST['username']]);
			if ($ud!=NULL) {
				require_once 'models/photos.php';
				$l = new Photos();
				$list = $l->getByAttributes(['addedBy'=>$ud[0]['id']]);
			}
		}

		$view->render('filelists', ['list'=>$list]);
	}
}