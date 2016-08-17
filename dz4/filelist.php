<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Список файлов</title>
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
		.listFileBlock {
			 width: 750px;
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
			display: block;
			float: left;
		}

		input[type=submit] {
			display: block;
			margin: 0 auto;
		}
		#messagebox {
			width: 600px;
			text-align: center;
			padding: 10px;
			margin: 10px auto;
		}
		a {
			color: #ffffff;
			text-decoration: none;
		}
		.listFileBlock table {
			width: 100%;
		}
		.listFileBlock table tr td:last-child {
			width: 200px;
		}
		.listFileBlock table tr .actions span {
			cursor: pointer;
		}
	</style>
</head>
<body>
<div id="messagebox"></div>
<div class="listFileBlock">
	<h3>Список файлов</h3>
	<table>
		<tr><td>#</td><td>Имя файла</td><td>Действие</td></tr>
		<?
		if ($handle = opendir("photos")) {
			while ($entry = readdir($handle)) {
				if (($entry!='.')&&($entry!='..')) echo '<tr><td>#</td><td class="namefile">'.$entry.'</td><td class="actions"><span class="rename" filename="'.$entry.'">Переименовать</span> <span class="delete" filename="'.$entry.'">Удалить</span></td></tr>';
			}
			closedir($handle);
		}
		?>
	</table>
</div>
<script type="text/javascript" src="scripts/jquery.js"></script>
<script type="text/javascript" src="scripts/script.js"></script>
</body>
</html>