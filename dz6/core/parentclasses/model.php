<?php
class Model {
	public $dblink = NULL;
	public $tablename;
	public $PK;

	public function __construct($tableName) {
		$this->tablename = $tableName;
		$this->dblink = DBCase::connect();
	}

	public function getAll($limit=NULL, $order='ASC') {
		$array = [];
		$i = 0;
		$SQL = "SELECT * FROM `{$this->tablename}`";
		$SQL .= ' ORDER BY `'.$this->PK.'` '.$order;
		if ($limit!=NULL) {
			$SQL .= ' LIMIT '.$limit;
		}
		$res = mysqli_query($this->dblink, $SQL);
		while ($row = mysqli_fetch_array($res)) {
			$array[$i] = $row;
			$i++;
		}
		return $array;
	}

	public function getAllOrder($limit=NULL, $orderby=NULL, $order='ASC') {
		$array = [];
		if ($orderby==NULL) {
			$orderby = $this->PK;
		}
		$i = 0;
		$SQL = "SELECT * FROM `{$this->tablename}`";
		$SQL .= ' ORDER BY `'.$orderby.'` '.$order;
		if ($limit!=NULL) {
			$SQL .= ' LIMIT ' . $limit;
		}
		$res = mysqli_query($this->dblink, $SQL);
		while ($row = mysqli_fetch_array($res)) {
			$array[$i] = $row;
			$i++;
		}
		echo mysqli_error($this->dblink);
		return $array;
	}

	public function getByID($id) {
		$id = (int)$id;
		$res = mysqli_query($this->dblink, 'SELECT * FROM '.$this->tablename.' WHERE `'.$this->PK."`='$id' ORDER BY `".$this->PK."`ASC");
		$row = mysqli_fetch_array($res);
		return $row;
	}

	public function newLine($arrayFeild) {
		$columns = '';
		$values = '';
		$i = 0;
		foreach ($arrayFeild as $key=>$value) {
			if ($i>0) {
				$columns .= ', ';
				$values .= ', ';
			}
			$columns .= '`'.mysqli_real_escape_string($this->dblink, $key).'`';
			if ($value==NULL) {
				$values .= 'NULL';
			} else {
				$values .= "'".mysqli_real_escape_string($this->dblink, $value)."'";
			}
			$i++;
		}
		$SQL = 'INSERT INTO '.$this->tablename.' ('.$columns.') VALUES ('.$values.');';
		if (mysqli_query($this->dblink, $SQL)) {
			return mysqli_insert_id($this->dblink);
		} else {
			return false;
		}
	}

	public function getByAttributes($attributes, $limit=NULL, $order='ASC') {
		$SQL = "SELECT * FROM `{$this->tablename}`";
		$result = [];
		$where = ' WHERE ';
		$i = 0;
		foreach ($attributes as $key=>$val) {
			if ($i>0) {
				$where .= ' AND ';
			}
			$where .= '`'.$key.'` = '."'".mysqli_real_escape_string($this->dblink, $val)."'";
			$i++;
		}
		$SQL .= $where;
		$SQL .= ' ORDER BY `'.$this->PK.'` '.$order;
		if ($limit!=NULL) {
			$SQL .= ' LIMIT '.$limit;
		}
		$res = mysqli_query($this->dblink, $SQL);
		$i = 0;
		while ($row = mysqli_fetch_array($res)) {
			$result[$i] = $row;
			$i++;
		}
		return $result;
	}

	public function getFirst() {
		$res = mysqli_query($this->dblink, 'SELECT * FROM '.$this->tablename.' ORDER BY `'.$this->PK.'`ASC LIMIT 1');
		$row = mysqli_fetch_array($res);
		return $row;
	}

	public function getLast() {
		$res = mysqli_query($this->dblink, 'SELECT * FROM '.$this->tablename.' ORDER BY `'.$this->PK.'`DESC LIMIT 1');
		$row = mysqli_fetch_array($res);
		return $row;
	}
}