<?php

class filelistsController extends Controller {
	public function indexAction() {
		$view = new View();
		$list = NULL;
		if (isset($_POST['username'])) {
			require_once 'models/users.php';
			$ud = users::where('login', '=', $_POST['username'])->get();
			if ($ud!=NULL) {
				require_once 'models/photos.php';
				$list = photos::where('addedBy', '=', $ud[0]['id'])->get();
			}
		}

		$view->render('filelists', ['list'=>$list]);
	}
}