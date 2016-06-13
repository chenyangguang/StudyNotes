<?php
$url = "http://www.baidu.com";
$curl = curl_init($url); //初始化
curl_exec($curl); //执行，
curl_close($curl); //关闭

?>
