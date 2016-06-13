<?php
header("Content-type:text/html;charset=utf-8");
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, 'http://www.baidu.com');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$data = curl_exec($curl);
curl_close($curl);
var_dump($data);
// print_r($data);
// echo $data;
