<?php

/**
 * Created by PhpStorm.
 * User: Nikolay.Alekseev
 * Date: 23.09.2016
 * Time: 15:49
 */
class uploadimageController extends Controller {
	public function indexAction() {
		$error = true;
		$errorcode = '';

		$allowed = array('jpg');
		$u = getUserInfo($_COOKIE['login'], $db);
		if ($u['password']==$_COOKIE['password']) {
			if(isset($_FILES['photo']) && $_FILES['photo']['error'] == 0){
				$extension = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
				if(!in_array(strtolower($extension), $allowed)){
					$errorcode = 'Неверный формат файла';
				} else {
					$tmp1 = md5(microtime());
					$tmp2 = md5(uniqid());
					$newFileName = substr(md5($tmp1.$tmp2),0,9).'.jpg';
					$result = move_uploaded_file($_FILES['photo']['tmp_name'], 'photos/'.$newFileName);
					if($result){
						$error = false;
						$SQL = 'INSERT INTO `photos` VALUES (NULL, "'.$newFileName.'", '.$u['id'].');';
						mysqli_query($db, $SQL);
						$errorcode = '';
					} else {
						$errorcode = 'Ошибка перемещения файла';
					}
				}
			} else {
				$errorcode = 'Файл не был передан';
			}
		} else {
			$errorcode = 'Ошибка прав доступа';
		}
		echo json_encode(array('error'=>$error, 'errorcode'=>$errorcode, 'filename'=>$newFileName));
	}
}