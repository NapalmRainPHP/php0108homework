<?php
class users extends Illuminate\Database\Eloquent\Model {
	public $timestamps = false;
	public static function getUsersList() {
		require_once 'models/profiles.php';
		$result = users::all();
		$list = [];
		for ($i = 0; $i<count($result); $i++) {
			$p = profiles::where('user', ' = ', $result[$i]['id'])->get();
			if (is_array($p)) {
				$p = $p[0];
			} else {
				$p = ['name'=>'', 'age'=>0, 'about'=>'', 'user'=>$list[$i]['id']];
			}
			$list[] = array_merge($result[$i], $p);
		}
		return $list;
	}
	public static function getUserInfo($login) {
		require_once 'models/profiles.php';
		$result = users::where('login', '=', $login)->first();
		if (count($result)>0) {
			$profile = profiles::where('user', '=', $result['id']);
			if (count($profile)<1) $profile = array();
			$result['profile'] = $profile;
			return $result;
		} else {
			return null;
		}
	}
}
/*class Users extends Model {
	public $id;
	public $login;
	public $password;

	public function __construct() {
		$this->PK = 'id';
		parent::__construct(strtolower(__CLASS__));
	}

	public function save() {
		return $this->newLine(['login'=>$this->login, 'password'=>$this->password]);
	}

	public function getUsersList() {
		$result = [];
		$list = $this->getAll();
		$profile = new Profiles();
		for ($i = 0; $i<count($list); $i++) {
			$p = $profile->getByAttributes(['user'=>$list[$i]['id']]);
			if (is_array($p)) {
				$p = $p[0];
			} else {
				$p = ['name'=>'', 'age'=>0, 'about'=>'', 'user'=>$list[$i]['id']];
			}
			$result[] = array_merge($list[$i], $p);
		}
	}

}*/