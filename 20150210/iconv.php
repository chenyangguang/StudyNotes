<?php
$arr = "输出json数据";
$newArr = iconv("UTF-8", "GBK", $arr);
$newArr2 = iconv("GBK", "UTF-8", $newArr);
echo $newArr2;
echo $newArr;

echo json_encode($newArr);
//exit();
//通信数据满足三个格式
//status
//data
//
?>
