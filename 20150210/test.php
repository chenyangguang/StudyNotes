<?php
//require_once("./response.php");
require_once('./file.php');
$data  = array(
    'id'=>1,
    'name'=>'chenyangguang',
    'type' => array(4,46, 478),
);

//Response::json(200, '数据返回成功', $arr);
//Response::show(200, 'success', $arr, 'array');
$file = new File();
var_dump($file);
if ($file->cacheData('index_mk_cache', $data)) {
    echo "success";
}else{
    echo "error";
}
?>
