<?php
class profileController extends Controller {
	public function indexAction() {
		$view = new View();
		$p = NULL;
		require_once 'models/profiles.php';
		if (isset($_GET['id'])) {
			$id = (int)$_GET['id'];
			$p = profiles::where('user', $id)->first()->toArray();
		}

		$view->render('profile', ['userdata'=>$p]);
	}
}