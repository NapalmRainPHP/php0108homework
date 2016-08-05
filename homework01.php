<?php
/*
	Created by: Alekseev Nikolay
	homework #01
	05.08.16
*/

echo '<h3>Задание #1</h3>';

$name = 'Николай';
$age = '29';

echo 'Меня зовут: '.$name.'<br>';
echo 'Мне '.$age.' лет<br>';
echo '"!|\\/\'"/';

echo '<h3>Задание #2</h3>';

$total = 80;
$markers = 23;
$pencil = 40;
$paints;

$paints = $total - ($markers + $pencil);
echo 'Красками выполенено: '.$paints.' работ';

echo '<h3>Задание #3</h3>';

define('COMECONST', 15);

if (defined('COMECONST')) {
	echo 'Константа COMECONST существует<br>';
} else {
	echo 'Константа COMECONST не существует<br>';
}

echo 'COMECONST = '.COMECONST;

//COMECONST = 'new value'; //Parse error: syntax error, unexpected '='

echo '<h3>Задание #4</h3>';
$age;
$age = 15;
if (($age>=18) && ($age<=65)) {
	echo 'Вам ещё работать и работать';
} elseif ($age>65) {
	echo 'Вам пора на пенсию';
} elseif (($age>0) && ($age<18)) {
	echo 'Вам ещё рано работать';
} else {
	echo 'Неизвестный возраст';
}

echo '<h3>Задание #5</h3>';

$day = 8;
switch ($day) {
	case 1:
	case 2:
	case 3:
	case 4:
	case 5:
		echo 'Это рабочий день';
		break;
	case 6:
	case 7:
		echo 'Это выходной день';
		break;
	default:
		echo 'неизвестный день';
		break;
}

echo '<h3>Задание #6</h3>';
$bmw = ['X5', 120, 5, '2015'];
$toyota = ['corolla', 130, 4, '2014'];
$opel = ['astra', 110, 5, '2007'];
$cars = array();
$cars[] = ['car'=>'bmw', 'props'=>$bmw];
$cars[] = ['car'=>'toyota', 'props'=>$toyota];
$cars[] = ['car'=>'opel', 'props'=>$opel];

for ($i = 0; $i < 3; $i++) {
	echo $cars[$i]['car'].'<br>';
	echo join(' ', $cars[$i]['props']).'<br>';
}


echo '<h3>Задание #7</h3>';
echo '<table cellspacing = 0>';
for ($i = 1; $i < 11; $i++) {
	echo '<tr>';
	for ($j = 1; $j < 11; $j++) {
		$result = $i * $j;
		if (($i%2==0) && ($j%2==0)) {
			echo '<td style="border: 1px solid red; text-align: center; padding: 5px">('.$result.')</td>';
		} elseif(($i%2==1) && ($j%2==1)) {
			echo '<td style="border: 1px solid red; text-align: center; padding: 5px">['.$result.']</td>';
		} else {
			echo '<td style="border: 1px solid red; text-align: center; padding: 5px">'.$result.'</td>';
		}
	}
	echo '</tr>';
}
echo '</table>';

echo '<h3>Задание #7</h3>';

$str = 'Это строковая переменная со словами разделёнными пробелом';
echo $str.'<br>';
$str = explode(' ', $str);
print_r($str);
echo '<br>';

$i = 0;
$newStr = '';
while ($i < count($str)) {
	$newStr .= $str[$i];
	$i++;
	if ($i < count($str)) $newStr .= '-';
}
echo $newStr.'<br>';