<?php

//  二分查找
function binary_search($arr = [], $search)
{
    $len = count($arr);
    $begin = 0;
    $end = $len - 1;
    if($search < $arr[$begin] || $search > $arr[$end]) return false;

    while($begin <= $end) {
        $tmp_mid = floor(($begin + $end) / 2);
        if($arr[$tmp_mid] == $search) return $tmp_mid;

        if($arr[$tmp_mid] > $search) {
            $end = $tmp_mid - 1; // 小于中间值，跑前面找
        } else {
            $begin = $tmp_mid + 1; // 大于中间值，跑后面去找
        }
    }
}

$arr = [11, 2, 43432, 22, 86, 210, 320, 223];
var_dump(binary_search($arr, 86));
var_dump(binary_search($arr, 22));

