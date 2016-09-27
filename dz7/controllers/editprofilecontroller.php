<?php
class editprofileController extends Controller {
	public function indexAction() {
		require_once 'models/profiles.php';
		$error = true;
		$errorcode = 'Что-то пошло не так';
		extract($_POST, EXTR_OVERWRITE);
		$pinfo = profiles::where('user', $userid)->first();
		$p = profiles::find($pinfo['id']);
		$dataarray = $_POST;
		$dataarray['ip'] = $_SERVER['REMOTE_ADDR'];
		$is_valid = GUMP::is_valid($dataarray, array(
			'name' => 'required|min_len,6',
			'age' => 'required|alpha_numeric|max_numeric,100|min_numeric,6',
			'ip' => 'valid_ip',
			'about' => 'required|min_len,10'
		));

		if($is_valid === true) {
			$u = new users();
			$u->ip = $dataarray['ip'];
			$u->save();
			if ($p) {
				$p->name = $name;
				$p->age = $age;
				$p->about = $about;
				$p->save();
				$error = false;
			} else {
				$p = new profiles;
				$p->name = $name;
				$p->age = $age;
				$p->about = $about;
				$p->save();
				$error = false;
			}
		} else {
			$errorcode = $is_valid;
		}
		echo json_encode(['error'=>$error, 'errorcode'=>$errorcode]);
	}
}