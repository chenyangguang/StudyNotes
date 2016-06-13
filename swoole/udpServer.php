<?php
// 创建Server对象，监听 127.0.0.1:9502端口，类型为SWOOLE_SOCK_UDP
$server = new swoole_server("127.0.0.1", 9502, SWOOLE_PROCESS, SWOOLE_SOCK_UDP);

$server->on('Packet', function($server, $data, $clientinfo){
    $server->sendto($clientinfo['address'], $clientinfo['port'], "Server: " . $data);
    var_dump($clientinfo);
});

// start server
$server->start();

// !php %
// or php updServer.php
// then use 'netcat -u 127.0.0.1 9502' to connet test
