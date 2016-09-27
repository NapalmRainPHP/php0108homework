<?php
class categories extends Illuminate\Database\Eloquent\Model {
	public static function getChilds($catID) {
		categories::where('ParentCategories', $catID)->get()->toArray();
	}

	public static function getAllRecursive($catID=NULL) {
		$slist = [];
		if ($catID==NULL) {
			$slist['parents'] = categories::where('ParentCategories', 'IS NULL')->get()->toArray();
			foreach ($slist['parents'] AS $category) {
				$category['childs'] = categories::getChilds($category['id']);
			}
		} else {
			$slist['parents'] = categories::find((int)$catID)->toArray();
			$slist['parents']['childs'] = categories::getChilds((int)$catID);
		}
	}
}