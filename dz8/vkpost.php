<?php
$token = '3fa4a3b9d8028b5c35f33b5190e8885dbd6e7118566ef5fda17a0d98aa047e1916fe9ad23aca86062daf0';
$img = $_POST['image'];
$wall = $_POST['wall'];

//var_dump($img);

$set = vkRequest('wall.post', ['owner_id'=>$wall, 'friends_only'=>'1', 'message'=>'тест', 'attachments'=>$img], $token);

echo $set;

function vkRequest($method, $options = [], $token = '') {
	$params = http_build_query($options);
	$url = 'https://api.vk.com/method/'.$method.'?'.$params.'&access_token='.$token.'&v=5.56';
	$curl = curl_init();

	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($curl, CURLOPT_URL, $url);

	$response = curl_exec($curl);
	curl_close($curl);

	return $response;
}