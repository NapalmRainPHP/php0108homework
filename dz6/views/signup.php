<div id="messagebox"></div>
<div class="loginForm">
	<form action="newuser" method="POST" id="regForm" reload="false">
		<div class="profileBlock">
			<h3>Регистрация</h3>
			<div class="formLine">
				<div class="labelFeild">Логин:</div><div class="inputFeild"><input type="text" name="login" required></div>
				<div class="clear_fix"></div>
			</div>
			<div class="formLine">
				<div class="labelFeild">Пароль:</div><div class="inputFeild"><input type="password" name="password" required></div>
				<div class="clear_fix"></div>
			</div>
			<div class="formLine">
				<div class="labelFeild">e-mail:</div><div class="inputFeild"><input type="text" name="email" required></div>
				<div class="clear_fix"></div>
			</div>
			<div class="g-recaptcha" data-sitekey="6LerCioTAAAAAFv1ndKT8mD6xppqfUiItKedk0rk"></div>
			<div class="formLine"><input type="submit" value="Зарегистрироваться"></div>
		</div>
	</form>
	<a href="signin">Авторизация</a>
</div>