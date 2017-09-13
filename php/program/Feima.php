<?php
/*
 * 费马假设：费马和帕斯卡一起玩一个抛硬币的游戏，每一次「头」（head）和「尾」（tail）的机会一样大。
 * 两人各出50法郎，凑成一共100法郎做赌注。
 * 两人谁先赢10盘，谁就拿走100法郎。
 * 抛出的硬币，如果是「头」，就是费马赢，记为「h」；如果是「尾」，就是帕斯卡赢，记为「t」。

 * 当赌局进行到 8 - 7、费马领先的时候，这个赌局因为一些突发状况，必须结束，且两人都要离开。100法郎该怎么分，才算公平呢？
*/

// php 实现费马假设
function feimaModel()
{
    $feima = 3; //mt_rand(1,9);// 让他们从1,9之间的比值就开始中断
    $kasipa = 0;
    while($feima < 10 && $kasipa < 10) {
        $fight = mt_rand(0, 1); // 1: 为 head, 费马赢; 2: 为 tail, 帕斯卡赢
        if ($fight) {
            $feima++;
        } else {
            $kasipa++;
        }
        if($feima === 10) {
            $win = 'f';
            break;
        }
        if($kasipa === 10){
            $win = 'k';
            break;
        }
    }

    return $win;
}

function probability($money, $times)
{
    $feima_win = $kasipa_win = 0;
    for($i = 1; $i < $times; $i++) {
        $res = feimaModel();
        $res === 'f' ? $feima_win++ : $kasipa_win++;

        $feima_pro = $feima_win / ($feima_win + $kasipa_win);
        echo '概率为:' . $feima_pro . '费马拿走了$: ' . ($money*$feima_pro), PHP_EOL;
    }

    return $feima_pro;
}

// 输入分的钱以及模拟测试次数

probability(100,100000);
