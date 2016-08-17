<?php
/**
 * Created by PhpStorm.
 * User: Nikolay.Alekseev
 * Date: 17.08.2016
 * Time: 12:27
 */
$array = ['items'=>['item1'=>'word', 'item2'=>'number', 'item3'=>'someValue', 'item4'=>[1, 2, 3, 4]], 2];
$json = json_encode($array);
$f = fopen('data/output.json', 'w+');
fputs($f, $json);
fclose($f);
unset($f);
unset($array);

$array2 = json_decode(file_get_contents('data/output.json'), true);

$array2['items']['item1'] = 'anotherWord';
$array2['items']['item4'][2] = 7;
$array2[0] = 5;

$f = fopen('data/output2.json', 'w+');
$json = json_encode($array2);
fputs($f, $json);
fclose($f);
unset($f);
unset($array2);

$array = json_decode(file_get_contents('data/output.json'), true);
$array2 = json_decode(file_get_contents('data/output2.json'), true);

foreach ($array AS $i=>$val) {
	if (is_array($val)) {
		foreach ($val AS $j=>$v) {
			if (is_array($v)) {
				foreach ($v AS $z=>$x) {
					$match = ($x==$array2[$i][$j][$z]) ? '':'Элемент '.$i.' '.$j.' '.$z.' оригинал: '.$x.' новое значение: '.$array2[$i][$j][$z].'<br>';
					echo $match;
				}
			} else {
				$match = ($v==$array2[$i][$j]) ? '':'Элемент '.$i.' '.$j.' оригинал: '.$v.' новое значение: '.$array2[$i][$j].'<br>';
				echo $match;
			}
		}
	} else {
		$match = ($val==$array2[$i]) ? '':'Элемент '.$i.' оригинал: '.$val.' новое значение: '.$array2[$i].'<br>';
		echo $match;
	}
}