<?php
class newuserController extends Controller {
	public function indexAction() {
		extract($_POST, EXTR_OVERWRITE);
		require_once 'models/users.php';
		$users = new Users();
		$ud = $users->getByAttributes(['login'=>$login]);
		$error = true;
		$errorcode = 'Пользователь с таким именем уже существует';

		if ((!isset($ud))||(empty($ud))) {
			$users->login = $login;
			$users->password = $password;
			$user = $users->save();
			if ($user) {
				$error = false;
				$errorcode = 'Вы успешно зарегистрированы. Можете пройти авторизацию';
			} else {
				$errorcode = $user;
			}
		}

		echo json_encode(['error'=>$error, 'errorcode'=>$errorcode]);
	}
}