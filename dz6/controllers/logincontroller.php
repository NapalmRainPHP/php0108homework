<?php

/**
 * Created by PhpStorm.
 * User: Varius
 * Date: 02.09.2016
 * Time: 22:41
 */
class loginController extends Controller {
	public function indexAction() {
		extract($_POST, EXTR_OVERWRITE);
		require_once 'models/users.php';
		$users = new Users();
		$ud = $users->getByAttributes(['login'=>$login]);
		$error = true;
		$errorcode = 'Неправильная пара логин-пароль';
		if ($ud!=NULL) {
			if ($password == $ud[0]['password']) {
				setcookie('login', $login);
				setcookie('password', $password);
				$error = false;
			}
		}

		echo json_encode(['error'=>$error, 'errorcode'=>$errorcode]);
	}
}