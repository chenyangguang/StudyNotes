<?php
/*
 * 生男生女比例是50%, 每个家庭生到第一个男孩就不再生，那么产生的男女比例是多少？
 * 
 */
function calculateBirthPercents($base)
{
    $female = 0;
    $male = 0;

    for($i = 1; $i < $base; $i++) {
        while(haveChildren()) {
            $female++; 
        }
        $male++;
        $percents = $female / $male;
        if($i % 100 === 0) {
            echo sprintf('calculate number: %d, percents=%f',
                         $i, $percents), PHP_EOL;
        }
    }

    return $percents;
}

function haveChildren() {
     return random_int(0,1);
}

calculateBirthPercents(100000000000000);