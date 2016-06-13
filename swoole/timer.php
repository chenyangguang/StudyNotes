<?php
/**
* swoole_timer_tick函数就相当于setInterval，是持续触发的
* swoole_timer_after函数相当于setTimeout，仅在约定的时间触发一次
* swoole_timer_tick/swoole_timer_after函数会返回一个整数，表示定时器的ID
* 可以使用 swoole_timer_clear 清除此定时器，参数为定时器ID
*
 **/
$serv = new swoole_server("127.0.0.1", 9501); 

// interval 2000ms
$serv->tick(2000, function ($timer_id) {
    echo "tick-2000ms\n";
});

// after 3000ms
$serv->after(3000, function () {
    echo "after 3000ms.\n";
});

