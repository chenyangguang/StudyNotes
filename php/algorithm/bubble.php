<?php

function bubbleSort($arr = [])
{
    $length = count($arr);
    if($length <= 1) return $arr;

    for ($i = 1; $i < $length; ++$i) {
        for ($k = 0; $k < $length - $i; ++$k) {
            if ($arr[$k] > $arr[$k+1]) {
                $temp = $arr[$k + 1];
                $arr[$k+1] = $arr[$k];
                $arr[$k] = $temp;
            }
        }
    }
    return $arr;
}

$arr = [1, 32, 54, 63, 21, 66, 32, 68, 36, 87, 39];
var_dump(bubbleSort($arr));
