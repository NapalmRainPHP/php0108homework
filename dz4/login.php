<?php
/**
 * Created by PhpStorm.
 * User: Nikolay.Alekseev
 * Date: 17.08.2016
 * Time: 14:07
 */
extract($_POST, EXTR_OVERWRITE);
require_once 'connect.php';
$ud = getUserInfo($login, $db);
$error = true;
$errorcode = 'Неправильная пара логин-пароль '.$login;
if ($password == $ud['password']) {
	setcookie('login', $login);
	setcookie('password', $password);
	$error = false;
}

echo json_encode(['error'=>$error, 'errorcode'=>$errorcode]);