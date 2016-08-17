<?php
/**
 * Created by PhpStorm.
 * User: Nikolay.Alekseev
 * Date: 17.08.2016
 * Time: 13:34
 */
$db = @mysqli_connect('localhost', 'root', '', 'homework');
if (mysqli_connect_errno()) {
	echo mysqli_connect_error();
	exit;
}

function getUserInfo($login, $dblink) {
	$res = mysqli_query($dblink, "SELECT * FROM `users` WHERE `login` = '$login' LIMIT 1;");
	$row = mysqli_fetch_array($res);
	return $row;
}

function getProfileInfo($userid, $dblink) {
	$userid = (int)$userid;
	$res = mysqli_query($dblink, "SELECT * FROM `profiles` WHERE `user` = $userid LIMIT 1;");
	$row = mysqli_fetch_array($res);
	return $row;
}