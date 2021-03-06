<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Регистрация</title>
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
		.loginForm {
			width: 400px;
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
			padding: 5px 0;
		}
		.labelFeild {
			width: 100px;
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
	</style>

</head>
<body>
<div id="messagebox"></div>
<div class="loginForm">
	<form action="newuser.php" method="POST" id="regForm" reload="false">
		<div class="profileBlock">
			<h3>Регистрация</h3>
			<div class="formLine"><div class="labelFeild">Логин:</div><div class="inputFeild"><input type="text" name="login" required></div></div>
			<div class="formLine"><div class="labelFeild">Пароль:</div><div class="inputFeild"><input type="password" name="password" required></div></div>
			<div class="formLine"><input type="submit" value="Зарегистрироваться"></div>
		</div>
	</form>
	<a href="index.php">Авторизация</a>
</div>
<script type="text/javascript" src="scripts/jquery.js"></script>
<script type="text/javascript" src="scripts/script.js"></script>
</body>
</html>