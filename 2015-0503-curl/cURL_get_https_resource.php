<?php
/**
 * 用cURL获取https的资源
 **/
$curlobj = curl_init();
$url = "https://ajax.aspnetcdn.com/ajax/jquery.validate/1.12.0/jquery.validate.js";
curl_setopt($curlobj, CURLOPT_URL, $url);
curl_setopt($curlobj, CURLOPT_RETURNTRANSFER, true);

date_default_timezone_set('PRC');
curl_setopt($curlobj, CURLOPT_SSL_VERIFYPEER, 0); //终止从服务器进行验证
$output = curl_exec($curlobj);
curl_close($urlobj);
echo $output;
?>
