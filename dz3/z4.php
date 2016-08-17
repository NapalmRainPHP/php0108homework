<?php
/**
 * Author: Nikolay.Alekseev
 * Date: 17.08.2016
 * Time: 12:59
 */
$url = 'https://en.wikipedia.org/w/api.php?action=query&titles=Main%20Page&prop=revisions&rvprop=content&format=json';
if($curl = curl_init()){
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($curl, CURLOPT_URL, $url);
	$response = curl_exec($curl);
	curl_close($curl);
	$result = json_decode($response, true);

	echo 'PageId = '.$result['query']['pages']['15580374']['pageid'].' TITLE '.$result['query']['pages']['15580374']['title'];
}