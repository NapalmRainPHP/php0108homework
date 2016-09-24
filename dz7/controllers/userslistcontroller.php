<?php
class userslistController extends Controller {
	public function indexAction() {
		$view = new View();
		require_once 'models/users.php';
		require_once 'models/profiles.php';
		$ulist = profiles::all()->sortByDesc('age')->toArray();

		for($i = 0; $i<count($ulist); $i++) {
			$ulist[$i]['user'] = users::find($ulist[$i]['user'])->toArray();
			$agest = ($ulist[$i]['age']>=18) ? 'Совершеннолетний':'Несовершенноледний';
			$ulist[$i]['agest'] = $agest;
		}
		$view->render('userslist', ['list'=>$ulist]);
//		$view->generate('userslist.twig', array("title" => "Список пользователей", 'header' => 'Список пользователей', 'data'=>$ulist));
	}
}