<table>
	<tr><td>#</td><td>ID</td><td>Имя</td><td>Совершеннолетность</td></tr>
	<?
	foreach ($list AS $line) {
		$agest = ($line['age']>18) ? 'Совершеннолетний':'Несовершенноледний';
		echo '<tr><td>#</td><td>'.$line['user']['id'].'</td><td>'.$line['name'].'</td><td>'.$agest.'</td></tr>';
	}
	?>
</table>
