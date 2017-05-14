<?php

//  二分查找
function binary_search($arr = [], $key)
{
    $end = count($arr);
    $begin = 0;
    if($end <= 0 || $begin > $end) return 0;

    while($begin <= $end) {
        $tmp_mid = intval(($begin + $end) / 2);
        if($arr[$tmp_mid] == $key) return $tmp_mid;

        if($arr[$tmp_mid] > $key) {
            $end = $mid - 1; // 小于中间值，跑前面找
        } else {
            $begin = $tmp_mid + 1; // 大于中间值，跑后面去找
        }
    }
}

$arr = [11, 2, 43432, 22, 86, 210, 320, 223];
var_dump(binary_search($arr, 86));

