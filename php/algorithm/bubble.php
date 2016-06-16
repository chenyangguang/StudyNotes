<?php
header("Content-type:text/html;charset=utf-8");
echo "php实现排序算法~冒泡".'<br />';
echo "
	在要排序的一组数中，对当前还未排好的序列，从前往后对相邻的两个数依次进行比较和调整，让较大的数往下沉，较小的往上冒。即，每当两相邻的数比较后发现它们的排序与排序要求相反时，就将它们互换
	"."<br />";

$arr = array(1, 32, 54, 63, 21, 66, 32, 68, 36, 87, 39);

function bubble($arr)
{
    $len = count($arr);
    for ($i = 1; $i < $len; $i++) {
        for ($k = 0; $k < $len - $i; $k++) {
            if ($arr[$k] > $arr[$k+1]) {
                $tmp = $arr[$k+1];
                $arr[$k+1] = $arr[$k];
                $arr[$k] = $tmp;
            }
        }
    }
    return $arr;
}
var_dump(bubble($arr));

function bubbleSort($arr)
{
    $length = count($arr);
    for ($i = 1; $i < $length; $i++) {
        for ($k = 0; $k < $length - $i; $k++) {
            if ($arr[$k] > $arr[$k+1]) {
                $temp = $arr[$k + 1];
                $arr[$k+1] = $arr[$k];
                $arr[$k] = $temp;
            }
        }
    }
    return $arr;
}
var_dump(bubbleSort($arr));
