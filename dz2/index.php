<?php
/**
 * Author: Nikolay.Alekseev
 * Date: 10.08.2016
 * Time: 10:13
 * HomeWork #2
 */
echo '<h2>Задание #1</h2>';

function printStrings($strings, $returns = false) {
	if ($returns === true) {
		$result = implode(' ', $strings);
		return $result;
	} else {
		for($i = 0; $i<count($strings); $i++) {
			echo '<p>'.$strings[$i].'</p>';
		}
	}
}

printStrings(['Некая строка', 'Вторая строка', 'Третья строка', 'Четвёрная строка']); // вариант 1
$str = printStrings(['Некая строка', 'Вторая строка', 'Третья строка', 'Четвёрная строка'], true); // вариант 2
echo $str;

echo '<h2>Задание #2</h2>';

function calculate($nums, $operation) {
	if (is_array($nums)) {
		$result = $nums[0];
		$nums = array_slice($nums, 1);
		switch ($operation) {
			case '+':
				foreach ($nums AS $num) {
					$result += $num;
				}
				break;
			case '-':
				foreach ($nums AS $num) {
					$result -= $num;
				}
				break;
			case '/':
				foreach ($nums AS $num) {
					$result /= $num;
				}
				break;
			case '*':
				foreach ($nums AS $num) {
					$result *= $num;
				}
				break;
			default:
				throw new Exception('Неизвестная арифметическая операция');
		}
		echo $result;
	} else {
		throw new Exception('Переменная <b>nums</b> не является массивом');
	}
}

try {
	calculate([1, 2, 3, 4, 5], '/');
} catch (Exception $e) {
	echo '<div style="color: #ff0000;">'.$e->getMessage().'</div>';
}

echo '<h3>Задание #3</h3>';

function calcEverything($operation, ...$nums) {
	$result = $nums[0];
	$nums = array_slice($nums, 1);
	switch ($operation) {
		case '+':
			foreach ($nums AS $num) {
				$result += $num;
			}
			break;
		case '-':
			foreach ($nums AS $num) {
				$result -= $num;
			}
			break;
		case '/':
			foreach ($nums AS $num) {
				$result /= $num;
			}
			break;
		case '*':
			foreach ($nums AS $num) {
				$result *= $num;
			}
			break;
	}
	echo $result;
}

calcEverything('+', 1, 2, 3, 5.2);

echo '<h3>Задание #4</h3>';

function multiplicationTable($x, $y) {
	if(preg_match("|^[\d]+$|", $x)){
		if(preg_match("|^[\d]+$|", $y)){
			echo '<table cellspacing = 0>';
			for ($i = 1; $i < $x+1; $i++) {
				echo '<tr>';
				for ($j = 1; $j < $y+1; $j++) {
					$result = $i * $j;
					echo '<td style="border: 1px solid red; text-align: center; padding: 5px">'.$result.'</td>';
				}
				echo '</tr>';
			}
			echo '</table>';
		} else {
			throw new Exception('Переменная <b>y</b> не является целочисленной');
		}
	} else {
		throw new Exception('Переменная <b>x</b> не является целочисленной');
	}
}

multiplicationTable(5, 7);

echo '<h3>Задание #5</h3>';

function is_polindrome($str) {
	$str = str_replace(' ','', $str);
	$str = mb_strtolower($str);
	$arr = preg_split('//u', $str, null, PREG_SPLIT_NO_EMPTY);
	$arr2 = array_reverse($arr);

	$str = implode('', $arr);
	$str2 = implode('', $arr2);

	$result = ($str==$str2) ? true:false;
	return $result;
}

function checkStr($str) {
	if (is_polindrome($str)) {
		echo 'Строка "'.$str.'" является полиндромом';
	} else {
		echo 'Строка "'.$str.'" не является полиндромом';
	}
}

checkStr('Некая строка');

echo '<h3>Задание #6</h3>';

echo date('d.m.Y h:i').'<br>';
echo mktime(0, 0, 0, 02, 24, 2016);

echo '<h3>Задание #7</h3>';

echo str_replace('К', '', 'Карл у Клары украл Кораллы').'<br>';
echo str_replace('Две', 'Три', 'Две бутылки лимонада');

echo '<h3>Задание #8</h3>';

function rFile($filename) {
	$fr = file_get_contents($filename);
	echo $fr;
}

rFile('text.txt');

echo '<h3>Задание #9</h3>';
$f = fopen('anothertest.txt', 'w+');
fputs($f, 'Hello again!');
fclose($f);