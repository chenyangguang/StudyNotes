<?php
/**
 * 基于第一个TCP服务器，只需要增加onTask和onFinish2个事件回调函数即可。另外需要设置task进程数量，可以根据任务的耗时和任务量配置适量的task进程。
 * finish操作是可选的，也可以不返回任何结果
 *
 **/
$serv = new swoole_server("127.0.0.1", 9502);

// 设置异步任务的工作进程数量
$serv->set(array('task_worker_num' => 4));

// attach handler for receive event, which have explained above.
$serv->on('receive', function($serv, $fd, $from_id, $data) {
    // we dispath a task to task workers by invoke the task() method of $serv
    // this method returns a task id as the identity of ths task
    // 投递异步任务
    $task_id = $serv->task($data);
    echo "Dispath AsyncTask: id=$task_id\n";
});

// attach handler for task event, the handler will be executed in task workers.
// 处理异步任务
$serv->on('task', function ($serv, $task_id, $from_id, $data) {
    // handle the task, do what you want with $data
    echo "New AsyncTask[id=$task_id]".PHP_EOL;

    // after the task task is handled, we return the results to caller worker.
    $serv->finish("$data -> OK");
});

// attach handler for finish event, the handler will be executed in server workers, the same worker dispatched this task before.
$serv->on('finish', function ($serv, $task_id, $data) {
    echo "AsyncTask[$task_id] Finish: $data".PHP_EOL;
});

$serv->start();
?>
