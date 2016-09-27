<?php
use Intervention\Image\ImageManagerStatic as Image;
class uploadController extends Controller {
	public function indexAction() {
		$error = true;
		$errorcode = '';
		$newFileName = '';
		require_once 'models/users.php';
		require_once 'models/photos.php';

		$allowed = array('jpg');
		if (isset($_COOKIE['login'])) {
			$u = users::getUserInfo($_COOKIE['login']);
			if ($u['password']==$_COOKIE['password']) {
				if(isset($_FILES['photo']) && $_FILES['photo']['error'] == 0){
					$extension = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
					if(!in_array(strtolower($extension), $allowed)) {
						$errorcode = 'Неверный формат файла';
					} else {
						$tmp1 = md5(microtime());
						$tmp2 = md5(uniqid());
						$newFileName = substr(md5($tmp1.$tmp2), 0, 9).'.jpg';
						$result = move_uploaded_file($_FILES['photo']['tmp_name'], 'photos/'.$newFileName);
						if($result){
							$image = Image::make('photos/'.$newFileName);
							if (($image->height()!=480) && (($image->width()!=480))) {
								$errorcode = 'Картинка должна быть размером 480 на 480 пикселей';
								unlink('photos/'.$newFileName);
							} else {
								$error = false;
								$photo = new photos();
								$photo->path = $newFileName;
								$photo->addedBy = $u['id'];
								$photo->save();
								$errorcode = '';
							}
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
		} else {
			$errorcode = 'Ошибка прав доступа';
		}

		echo json_encode(array('error'=>$error, 'errorcode'=>$errorcode, 'filename'=>$newFileName));
	}
}