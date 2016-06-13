<?php
/**
 * 登录慕课网并下载个人空间页面
 *
 **/
$url = "http://www.imooc.com/user/login";
$data = "username=17372948908ltt@163.com&password=zhishu235711&remember=1";
$curlobj = curl_init();
curl_setopt($curlobj, CURLOPT_URL, $url);
curl_setopt($curlobj, CURLOPT_RETURNTRANSFER, true); //执行之后不直接打印出来

//Cookie设置， 需要在所有会话开始之前设置
date_default_timezone_set('PRC'); // 时区
curl_setopt($curlobj, CURLOPT_COOKIESESSION, TRUE);
curl_setopt($curlobj, CURLOPT_COOKIEFILE, 'cookiefile');
curl_setopt($curlobj, CURLOPT_COOKIEJAR, 'cookiefile');
curl_setopt($curlobj, CURLOPT_COOKIE, session_name() . "=" . session_id());
curl_setopt($curlobj, CURLOPT_HEADER, 0);
curl_setopt($curlobj, CURLOPT_FOLLOWLOCATION, 1); // 支持cURL页面链接跳转

curl_setopt($curlobj, CURLOPT_POST, 1);
curl_setopt($curlobj, CURLOPT_POSTFIELDS, $data);
curl_setopt($curlobj, CURLOPT_HTTPHEADER, array("application/x-www-form-urlencoded", 
    "charset=utf-8", 
    "Content-length" . strlen($data)));
curl_exec($curlobj);
curl_setopt($curlobj, CURLOPT_URL, "http://www.imooc.com/space/index");
curl_setopt($curlobj, CURLOPT_POST, 0);
curl_setopt($curlobj, CURLOPT_HTTPHEADER, array("Content-type: text/xml"));
$output = curl_exec($curlobj);
curl_close($curlobj);
echo $output;
?>
