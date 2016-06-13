<?php
/**
 * 异步客户端是非阻塞的。可以用于编写高并发的程序。
 * swoole官方提供的redis-async、mysql-async都是基于异步swoole_client实现的。
*
* 异步客户端需要设置回调函数，有4个事件回调必须设置
* onConnect、
* onError、
* onReceive、
* onClose。
* 分别在客户端连接成功、连接失败、收到数据、连接关闭时触发。
*
* $client->connect() 发起连接的操作会立即返回，不存在任何等待。
* 当对应的IO事件完成后，swoole底层会自动调用设置好的回调函数。
*
* 异步客户端只能用于cli环境
 **/
$client = new swoole_client(SWOOLE_SOCKET_TCP, SWOOLE_SOCK_ASYNC);

// 注册连接成功回调
$client->on('connect', function($cli){
    $cli->send("妹妹你坐船头呀，哥哥他岸上走\n");
});

// 注册数据接受回调
$client->on("receive", function($cli, $data){
    echo "Received: {$data}\n";
});

// 注册连接失败回调
$client->on('error', function($cli){
    echo "Connect failed\n";
});

// 注册连接关闭回调
$client->on('close', function($cli){
    echo "Connection close\n";
});


// 发起连接
$client->connect('127.0.0.1', 9501, 0.5);

