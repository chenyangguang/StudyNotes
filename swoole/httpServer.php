<?php
/**
 * 0.0.0.0 表示监听所有IP地址，一台服务器可能同时有多个IP，如127.0.0.1本地回环IP、192.168.1.100局域网IP、210.127.20.2 外网IP，这里也可以单独指定监听一个IP
 * 9501 监听的端口，如果被占用程序会抛出致命错误，中断执行
 **/
$http = new swoole_http_server("0.0.0.0", 9501);

$http->on('request', function ($request, $response) {
    var_dump($request->get, $request->post);
    $response->header("Content-Type", "text/html; charset=utf-8");
    $response->end("<h1>Hello Swoole. #".rand(1000, 9999)."</h1>");
});

$http->start();

// 可以打开浏览器，访问http://127.0.0.1:9501查看程序的结果。

