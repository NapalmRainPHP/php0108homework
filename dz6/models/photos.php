<?php
class Photos extends Model {
	public $id;
	public $path;
	public $addedBy;

	public function __construct() {
		$this->PK = 'id';
		parent::__construct(strtolower(__CLASS__));
	}
	public function save() {
		return $this->newLine(['path'=>$this->path, 'addedBy'=>$this->addedBy]);
	}
}