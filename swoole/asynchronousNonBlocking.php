<?php
$client = new swoole_client(SWOOLE_SOCK_TCP, SWOOLE_SOCK_ASYNC);

$client->on("connect", function($cli) {
        $cli->send("hello world\n");
});
$client->on("receive", function($cli, $data){
        echo "Received: ".$data."\n";
});
$client->on("error", function($cli){
        echo "Connect failed\n";
});
$client->on("close", function($cli){
        echo "Connection close\n";
});

$client->connect('127.0.0.1', 9501, 0.5);
?>
