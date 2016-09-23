<?php
class Users extends Model {
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

}