<?php
/**
 * Created by PhpStorm.
 * User: Nikolay.Alekseev
 * Date: 17.08.2016
 * Time: 14:01
 */
extract($_POST, EXTR_OVERWRITE);
require_once 'connect.php';
$u = getUserInfo($_COOKIE['login'], $db);
$p = getProfileInfo($u['id'], $db);

$error = true;
$errorcode = '';
if ($u['password']==$_COOKIE['password']) {
	$name = htmlspecialchars($name);
	$age = htmlspecialchars($age);
	$about = htmlspecialchars($about);
	if ((isset($p))&&(!empty($p))) {
		$SQL = 'UPDATE `profiles` SET `name` = "'.$name.'", `age` = "'.$age.'", `about` = "'.$about.'" WHERE `user`= '.$u['id'].';';
	} else {
		$SQL = 'INSERT INTO `profiles` VALUES (NULL, "'.$name.'", "'.$age.'", "'.$about.'", '.$u['id'].');';
	}
	if (mysqli_query($db, $SQL)) {
		$error = false;
	} else {
		$errorcode = mysqli_error($db);
	}
} else {
	$errorcode = 'Ошибка прав доступа';
}


echo json_encode(['error'=>$error, 'errorcode'=>$errorcode]);