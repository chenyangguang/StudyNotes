<?php
/**
 * 2015-05-03
 * php-curl-replace
 * 在网络上下载一个网页并把内容中的“百度”替换成“sunshine”之后输出
 *
 **/
$url = "http://www.baidu.com";
$curlobj = curl_init(); // 初始化
curl_setopt($curlobj, CURLOPT_URL, $url); // 设置要访问的页面
curl_setopt($curlobj, CURLOPT_RETURNTRANSFER, true); // 执行之后不直接打印出来
$output = curl_exec($curlobj); // 执行
curl_close($curlobj);
echo str_replace("百度", "sunshine", $output);
?>
