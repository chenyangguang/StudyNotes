<?php
//Swoole also provides a Client component to build tcp/udp clients in both asynchronous and synchronous ways. Swoole uses the swoole_client class to expose all its functionalities.
$client = new swoole_client(SWOOLE_SOCK_TCP);
if (!$client->connect('127.0.0.1', 9501, 0.5))
{
        die("connect failed.");
}

if (!$client->send("hello world"))
{
        die("send failed.");
}

$data = $client->recv();
if (!$data)
{
        die("recv failed.");
}

$client->close();
?>
