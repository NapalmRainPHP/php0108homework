<?php
error_reporting(E_ALL);
$route = 'index';
require_once 'vendor/autoload.php';

if (isset($_GET['route'])) {
	$route = $_GET['route'];
}
define('ROUTE', $route);
require_once 'core/application.php';

$app = new Application();
$app->run();