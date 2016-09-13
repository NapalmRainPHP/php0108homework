<?php
class Profiles extends Model {
	public $id;
	public $name;
	public $age;
	public $about;
	public $user;

	public function __construct() {
		$this->PK = 'id';
		parent::__construct(strtolower(__CLASS__));
	}

	public function save() {
		return $this->newLine(['name'=>$this->name, 'age'=>$this->age, 'about'=>$this->about, 'user'=>$this->user]);
	}
}