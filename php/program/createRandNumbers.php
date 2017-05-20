<?php
function  createRandNumbers($from, $to, $limit) {
    
    $arr = [];
    for ($i = 0; $i < $limit; ++$i) {
        $arr[] = mt_rand($from, $to);
    }

    return $arr;
}
  
$nums_arr = createRandNumbers(-1000, 10000, 1000);
print_r($nums_arr);
