<?php
/**
 * Created by PhpStorm.
 * User: Nikolay.Alekseev
 * Date: 17.08.2016
 * Time: 13:29
 */
require_once 'connect.php';

if (isset($_COOKIE['login'])) {
	extract($_COOKIE, EXTR_OVERWRITE);
	$udata = getUserInfo($login, $db);
	if ($udata['password']==$password) {
		require_once 'profile.php';
	} else {
		require_once 'loginform.html';
	}
} else {
	require_once 'loginform.html';
}