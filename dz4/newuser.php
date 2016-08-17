<?php
/**
 * Created by PhpStorm.
 * User: Nikolay.Alekseev
 * Date: 17.08.2016
 * Time: 18:29
 */
extract($_POST, EXTR_OVERWRITE);
require_once 'connect.php';
$error = true;
$errorcode = 'Пользователь с таким именем уже существует';

$u = getUserInfo($login, $db);

if ((!isset($u))||(empty($u))) {
	$SQL = 'INSERT INTO `users` SET `login` = "'.$login.'", `password` = "'.$password.'";';
	if (mysqli_query($db, $SQL)) {
		$error = false;
		$errorcode = 'Вы успешно зарегистрированы. Можете пройти авторизацию';
	} else {
		$errorcode = mysqli_error($db);
	}
}

echo json_encode(['error'=>$error, 'errorcode'=>$errorcode]);