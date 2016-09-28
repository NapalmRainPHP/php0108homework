<?php
class categories extends Illuminate\Database\Eloquent\Model {
	public static function getChilds($catID) {
		$result = [];
		$list = categories::where('ParentCategories', $catID)->get()->toArray();
		foreach ($list AS $item) {
			$childs = categories::getChilds($item['id']);
			$result[] = [$item, 'childs'=>$childs];
		}
		return $result;
	}

	public static function getAllRecursive($catID=NULL) {
		$slist = [];
		$result = [];
		if ($catID==NULL) {
			$slist['parents'] = categories::where('ParentCategories', NULL)->get()->toArray();
			foreach ($slist['parents'] AS $category) {
				$childs = categories::getChilds($category['id']);
				$result[] = [$category, 'childs'=>$childs];
			}
		} else {
			$slist['parents'] = categories::find((int)$catID)->toArray();
			$result[] = [$slist['parents'], 'childs'=>categories::getChilds((int)$catID)];
		}
		return $result;
	}
}