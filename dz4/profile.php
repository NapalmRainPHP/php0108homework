<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Загрузка картинок</title>
	<style>
		* {
			box-sizing: border-box;
			margin: 0;
			padding: 0;
		}
		body {
			background: #2b2b2b;
			color: #ffffff;
			font-family: sans-serif;
		}
		h3 {
			text-align: center;
			padding: 0 0 15px 0;
		}
		.profileForm {
			width: 600px;
			margin: 20px auto;
			padding: 20px;
			background: #313335;
			border: 1px solid #3c3f41;
		}
		input {
			background: #2b2b2b;
			text-align: center;
			border: 1px solid #797979;
			line-height: 30px;
			color: white;
			min-width: 150px;
		}
		.formLine div {
			float: left;
		}
		.formLine {
			width: 100%;
			clear: both;
			line-height: 30px;
			height: 30px;
			padding: 5px 0;
		}
		.labelFeild {
			width: 100px;
		}
		input[type=submit] {
			display: block;
			margin: 0 auto;
		}
		input[type=text] {
			width: 400px;
		}
		#messagebox {
			width: 600px;
			text-align: center;
			padding: 10px;
			margin: 10px auto;
		}
		#progressBar {
			width: 100%;
			height: 35px;
			background: #2b2b2b;
			border: 1px solid #797979;
			position: relative;
			overflow: hidden;
		}
		#pbar {
			position: absolute;
			top: 0;
			left: 0;
			width: 0%;
			background: #3c3f41;
			height: inherit;
			z-index: 1;
		}
		#progress {
			position: relative;
			width: 100%;
			text-align: center;
			z-index: 2;
		}
	</style>
</head>
<?
require_once 'connect.php';
extract($_COOKIE, EXTR_OVERWRITE);
$u = getUserInfo($login, $db);
$p = getProfileInfo($u['id'], $db);
if (is_array($p)) extract($p, EXTR_OVERWRITE);
?>
<body>
	<div id="messagebox"></div>
	<div class="profileForm">
		<form action="uploader.php" method="POST" id="profileForm">
			<div class="profileBlock">
				<h3>Профиль</h3>
				<div class="formLine"><div class="labelFeild">Имя:</div><div class="inputFeild"><input type="text" name="name" required value="<?echo $name;?>"></div></div>
				<div class="formLine"><div class="labelFeild">Возраст:</div><div class="inputFeild"><input type="text" name="age" required value="<?echo $age;?>"></div></div>
				<div class="formLine"><div class="labelFeild">О себе:</div><div class="inputFeild"><input type="text" name="about" required value="<?echo $about;?>"><input type="hidden" name="userid" value="<?echo $u['id'];?>"></div></div>
				<div class="formLine"><input type="submit" value="Сохранить"></div>
			</div>
		</form>
	</div>
	<div class="profileForm">
		<form action="uploadimage.php" method="POST" id="uploadForm" enctype="multipart/form-data">
			<div class="profileBlock">
				<h3>Загрузка файлов</h3>
				<div class="formLine"><div class="labelFeild">Фото:</div><div class="inputFeild"><input type="file" name="photo"  required id="fileInput"></div></div>
				<div class="formLine"><div id="progressBar"><div id="progress"></div><div id="pbar"></div></div></div>
			</div>
		</form>
	</div>
	<script type="text/javascript" src="scripts/jquery.js"></script>
	<script type="text/javascript" src="scripts/script.js"></script>
</body>
</html>