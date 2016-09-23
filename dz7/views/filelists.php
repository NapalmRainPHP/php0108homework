<?
$data['header'] = 'Список файлов';
?>
<form method="POST">
	<h4>Введите логин пользователя</h4>
	<input type="text" name="username"><input type="submit">
</form>
<ul>
<?
if ($list!=NULL) {
	foreach ($list as $item) {
		echo '<li>'.$item['path'].'</li>';
	}
}
?>
</ul>

