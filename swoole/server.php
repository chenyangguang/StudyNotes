<?php

//创建Server对象，监听 127.0.0.1:9501端口
$serv = new swoole_server("127.0.0.1", 9501); 

// 使用EOF协议处理
$serv->set([
    'open_eof_split' => true,
    'package_eof' => "\r\n",
]);

// 固定包头的协议非常通用，在BAT的服务器程序中经常能看到。
// 这种协议的特点是一个数据包总是由包头+包体2部分组成。
// 包头由一个字段指定了包体或整个包的长度，长度一般是使用2字节/4字节整数来表示。服务器收到包头后，可以根据长度值来精确控制需要再接收多少数据就时完整的数据包。
// Swoole的配置可以很好的支持这种协议，可以灵活地设置4项参数应对所有情况。
/**
 * $server->set([
       'open_length_check' => true,
       'package_max_length' => 81920,
       'package_length_type' => 'n', //see php pack()
       'package_length_offset' => 0,
       'package_body_offset' => 2,
 * ]);
 **/

//监听连接进入事件
$serv->on('connect', function ($serv, $fd) {  
    echo "Client: Connect.\n";
});

//监听数据发送事件
$serv->on('receive', function ($serv, $fd, $from_id, $data) {
    $serv->send($fd, "Server: ".$data);
});

//监听连接关闭事件
$serv->on('close', function ($serv, $fd) {
    echo "Client: Close.\n";
});

//启动服务器
$serv->start(); 
