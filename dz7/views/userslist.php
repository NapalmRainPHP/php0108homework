<table>
	<tr><td>#</td><td>ID</td><td>Имя</td><td>Совершеннолетность</td></tr>
	<?
	foreach ($list AS $line) {
		$agest = ($line['age']>=18) ? 'Совершеннолетний':'Несовершенноледний';
		echo '<tr><td>#</td><td>'.$line['user']['id'].'</td><td><a href="profile?id='.$line['user']['id'].'">'.$line['name'].'</a></td><td>'.$agest.'</td></tr>';
	}
	?>
</table>
