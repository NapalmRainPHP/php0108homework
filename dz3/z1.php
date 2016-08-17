<?php
/**
 * Author: Nikolay.Alekseev
 * Date: 17.08.2016
 * Time: 11:29
 */

function saveFile($struct, $fileName) {
	$doc = new DOMDocument();
	$doc->loadXML($struct);
	$doc->save('data/'.$fileName);
}

$file = '<?xml version="1.0"?>
<PurchaseOrder PurchaseOrderNumber="99503" OrderDate="1999-10-20">
  <Address Type="Shipping">
    <Name>Ellen Adams</Name>
    <Street>123 Maple Street</Street>
    <City>Mill Valley</City>
    <State>CA</State>
    <Zip>10999</Zip>
    <Country>USA</Country>
  </Address>
  <Address Type="Billing">
    <Name>Tai Yee</Name>
    <Street>8 Oak Avenue</Street>
    <City>Old Town</City>
    <State>PA</State>
    <Zip>95819</Zip>
    <Country>USA</Country>
  </Address>
  <DeliveryNotes>Please leave packages in shed by driveway.</DeliveryNotes>
  <Items>
    <Item PartNumber="872-AA">
      <ProductName>Lawnmower</ProductName>
      <Quantity>1</Quantity>
      <USPrice>148.95</USPrice>
      <Comment>Confirm this is electric</Comment>
    </Item>
    <Item PartNumber="926-AA">
      <ProductName>Baby Monitor</ProductName>
      <Quantity>2</Quantity>
      <USPrice>39.98</USPrice>
      <ShipDate>1999-05-21</ShipDate>
    </Item>
  </Items>
</PurchaseOrder>';

function printOpder($fileName) {
	$result = '<div class="mainBlock">';
	$file = 'data/'.$fileName;
	$doc = simplexml_load_file($file);
	$attrs = $doc->attributes();
	$result .= '<h1>Заказ № '.$attrs['PurchaseOrderNumber'].'</h1>';
	$result .= '<h4>'.$attrs['OrderDate'].'</h4>';
	$result .= '<hr>';
	$result .= '<div><h4>Данные для доставки</h4></div>';
	$result .= '<div>Имя: '.$doc->Address[0]->Name.'</div>';
	$result .= '<div>Страна: '.$doc->Address[0]->Country.'</div>';
	$result .= '<div>Штат: '.$doc->Address[0]->State.'</div>';
	$result .= '<div>Город: '.$doc->Address[0]->City.'</div>';
	$result .= '<div>Адрес: '.$doc->Address[0]->Street.'</div>';
	$result .= '<div>Индекс: '.$doc->Address[0]->Zip.'</div>';
	$result .= '<hr>';
	$result .= '<div><h4>Данные оплаты</h4></div>';
	$result .= '<div>Имя: '.$doc->Address[1]->Name.'</div>';
	$result .= '<div>Страна: '.$doc->Address[1]->Country.'</div>';
	$result .= '<div>Штат: '.$doc->Address[1]->State.'</div>';
	$result .= '<div>Город: '.$doc->Address[1]->City.'</div>';
	$result .= '<div>Адрес: '.$doc->Address[1]->Street.'</div>';
	$result .= '<div>Индекс: '.$doc->Address[1]->Zip.'</div>';

	$result .= '<hr>';
	$result .='<div>Комментарий к заказу: '.$doc->DeliveryNotes.'</div>';
	$result .= '<hr>';
	$result .= '<h4>Позиции заказа</h4>';
	$result .= '<table>';
	$result .='<tr><td>#</td><td>Наименование</td><td>Количество</td><td>Цена</td><td>Дата доставки</td></tr>';
	foreach ($doc->Items->Item AS $item) {
		$attr = $item->attributes();
		$result .='<tr><td>'.$attr['PartNumber'].'</td><td>'.$item->ProductName.'</td><td>'.$item->Quantity.'</td><td>'.$item->USPrice.'</td><td>'.$item->ShipDate.'</td></tr>';
	}
	$result .= '</table>';
	$result .= '<div></div>';
	$result .= '</div>';
	return $result;
}

echo '<style>.mainBlock {
	margin: 10px auto;
	width: 700px;
	padding: 10px;
	border: 1px solid #797979;
}
	h1, h2, h3, h4 {
		color: #313335;
		margin: 10px auto;
		text-align: center;
	}
	table {
		width: 100%;
	}
</style>';

//saveFile($file, 'data.xml');
//echo printOpder('data.xml');