<?php
/*
 * 2元钱一瓶的啤酒，4个瓶盖换一瓶，2个空瓶换一瓶，现在你有10元钱可以喝几瓶？
 */

function drinkBeer($money)
{
    // 一共可以买 5 瓶
    $bottle = $money >> 1;
    $total = $gap = $empty_bottle = $bottle;

    // 换新酒
    while($gap >= 4 || $empty_bottle >= 2) {

        // 空瓶换新酒
        if($empty_bottle >= 2)  {
            $empty_bottle -= 1;
            $gap += 1;
            $total += 1;
        }
        // 瓶盖换新酒, 换回一个瓶盖，一个空瓶
        if($gap >= 4) {
            $gap -= 3;
            $empty_bottle += 1;
            $total += 1;
        }
    }
    
    // 喝完酒， 没有换的了。
    return $total;
}

$total_drink = drinkBeer(10);
var_dump($total_drink); // 15 瓶

