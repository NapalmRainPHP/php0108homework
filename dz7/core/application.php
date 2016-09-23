<?php
require_once 'core/config.php';
use Illuminate\Database\Capsule\Manager as Capsule;
$capsule = new Capsule;
$configs = Config::getSettings();

$capsule->addConnection([
	'driver'    => 'mysql',
	'host'      => $configs['host'],
	'database'  => $configs['dbname'],
	'username'  => $configs['username'],
	'password'  => $configs['password'],
	'charset'   => 'utf8',
	'collation' => 'utf8_unicode_ci',
	'prefix'    => '',
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();

class Application {
	public function run() {
		require_once 'core/parentclasses/dbcase.php';
		require_once 'core/parentclasses/model.php';
		require_once 'core/parentclasses/controller.php';
		require_once 'core/parentclasses/view.php';
		$route = explode('/', ROUTE);
		$page = NULL;
		$module = NULL;

		if (count($route)>1) {
			$page = $route[0].'Controller';
			if ((!isset($route[1]))||(empty($route[1]))||($route[1]==NULL)) {
				$action = 'indexAction';
			} else {
				$action = $route[1].'Action';
			}
			$route[1] = $action;
		} else {
			$page = $route[0].'Controller';
			$action = 'indexAction';
		}

		if (is_file('controllers/'.strtolower($page).'.php')) {
			require_once('controllers/'.strtolower($page).'.php');
			$p = new $page();
			if (method_exists($p, $action)) {
				$p->$action();
			} else {
				echo '404x';
			}
		} else {
			echo '404'.$page;
		}
	}
}