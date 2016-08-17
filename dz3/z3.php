<?php
/**
 * Author: Nikolay.Alekseev
 * Date: 17.08.2016
 * Time: 12:50
 */
$array = [];
for ($i = 0; $i<50; $i++) {
	$array[] = rand(1, 100);
}
$str = implode(',',$array);
$f = fopen('data/nums.csv', 'w+');
fputs($f, $str);
fclose($f);
unset($f);
$f = fopen('data/nums.csv', "r");
$res = array();
$res = fgetcsv($f, 500, ",");
fclose($f);
$sum = $res[0];
$res = array_slice($res, 1);
foreach ($res AS $value) {
	$sum += $value;
}

echo $sum;

