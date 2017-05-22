<?php
function  createRandNumbers($from = 0, $to = 0, $limit = 0)
{
    $arr   = [];
    $from  = intval($from);
    $to    = intval($to);
    $limit = abs($limit);

    if($from > $to) {
        $tmp = $to;
        $to = $from;
        $from = $tmp;
    }

    for ($i = 0; $i < $limit; ++$i) {
        $arr[] = mt_rand($from, $to);
    }

    return $arr;
}
  
$nums_arr = createRandNumbers(-1000, 10000, 1000);
print_r($nums_arr);
