<?php
$serv = new swoole_http_server("127.0.0.1", 9501, SWOOLE_BASE);

$port2 = $serv->listen("0.0.0.0", 9502, SWOOLE_SOCK_TCP);
$port2->on('receive', function (swoole_server $serv, $fd, $from_id, $data) {
        var_dump($data);
            $serv->send($fd, $data);    
});

$serv->on('request', function($req, $resp) {
        $resp->end("<h1>Hello World</h1>");
});


$serv->start();
?>
