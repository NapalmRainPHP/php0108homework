<?php
require_once 'vendor/autoload.php';
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Illuminate\Database\Capsule\Manager as Capsule;

$app = new Slim\App;
$capsule = new Capsule;

$capsule->addConnection([
	'driver'    => 'mysql',
	'host'      => 'localhost',
	'database'  => 'homework_shop',
	'username'  => 'root',
	'password'  => '',
	'charset'   => 'utf8',
	'collation' => 'utf8_general_ci',
	'prefix'    => 'vd_',
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();

$app->get('/', function($request, $response, $options) {
	$error = false;
	$answer = json_encode(['error'=>$error, 'response'=>'Hello!']);
	$response->write($answer);
	return $response;
});
//
$app->get('/catalog/{list}', function($request, $response, $options) {
	$cat = $options['list'];
	$error = true;
	$list = [];

	if ($cat == 'all') {
		require_once 'models/categories.php';
		$list = categories::all();
		$error = false;
	} else {
		require_once 'models/categories.php';
		$cat = (int)$cat;
		$list = categories::where('ParentCategories', $cat)->toArray();
		$error = false;
	}
	$answer = json_encode(['error'=>$error, 'response'=>$list]);
	$response->write('<pre>'.$answer.'</pre>');
	return $response;
});

$app->get('/hello/{name}', function ($request, $response, $args) {
	$response->write("Hello, " . $args['name']);
	return $response;
});

$app->run();