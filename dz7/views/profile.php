<div id="messagebox"></div>
<?php
if ($userdata==NULL) {
	echo 'Данные не существуют';
} else {
	?>
	<div class="loginForm">
		<form action='editprofile' method="post" id="profileForm">
			<div class="formLine">
				<div class="labelFeild">Имя:</div><div class="inputFeild"><input type="text" name="name" required value="<?echo $userdata['name'];?>"></div>
				<div class="clear_fix"></div>
			</div>
			<div class="formLine">
				<div class="labelFeild">Возраст:</div><div class="inputFeild"><input type="text" name="age" required value="<?echo $userdata['age'];?>"></div>
				<div class="clear_fix"></div>
			</div>
			<div class="formLine">
				<div class="labelFeild">Обо мне:</div><div class="inputFeild"><input type="text" name="about" required value="<?echo $userdata['about'];?>"><input type="hidden" name="userid" value="<?echo  $userdata['id'];?>"></div>
				<div class="clear_fix"></div>
			</div>
			<div class="formLine"><input type="submit" value="Сохранить"></div>
		</form>
	</div>
	<?
}