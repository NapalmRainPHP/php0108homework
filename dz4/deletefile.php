<?php
/**
 * Created by PhpStorm.
 * User: Nikolay.Alekseev
 * Date: 17.08.2016
 * Time: 18:24
 */
extract($_POST, EXTR_OVERWRITE);
require_once 'connect.php';
$u = getUserInfo($_COOKIE['login'], $db);

$error = true;
$errorcode = '';
if ($u['password']==$_COOKIE['password']) {
	unlink('photos/'.$filename);
	$SQL = 'DELETE FROM `photos` WHERE `path`= "'.$filename.'";';
	if (mysqli_query($db, $SQL)) {
		$error = false;
	} else {
		$errorcode = mysqli_error($db);
	}
} else {
	$errorcode = 'Ошибка прав доступа';
}


echo json_encode(['error'=>$error, 'errorcode'=>$errorcode]);