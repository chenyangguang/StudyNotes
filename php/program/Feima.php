<?php
/*
 * 费马假设：费马和帕斯卡一起玩一个抛硬币的游戏，每一次「头」（head）和「尾」（tail）的机会一样大。
 * 两人各出50法郎，凑成一共100法郎做赌注。
 * 两人谁先赢10盘，谁就拿走100法郎。
 * 抛出的硬币，如果是「头」，就是费马赢，记为「h」；如果是「尾」，就是帕斯卡赢，记为「t」。

 * 当赌局进行到 8 - 7、费马领先的时候，这个赌局因为一些突发状况，必须结束，且两人都要离开。100法郎该怎么分，才算公平呢？
*/

// php 实现费马假设
function feimaModel($feima, $kasipa)
{
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

/*
 * @param $money 加起来分的钱
 * @param $times 模拟的次数
 * @param $feima_begin 费马开局胜局数
 * @param @$kasipa_begin 卡斯帕开局胜局数
 */
function probability($money, $times)
{
    $feima_begin = mt_rand(1,9);
    $kasipa_begin = mt_rand(1,9);
    $feima_win = $kasipa_win = 0;
    for($i = 1; $i < $times; $i++) {
        $res = feimaModel($feima_begin, $kasipa_begin);
        $res === 'f' ? $feima_win++ : $kasipa_win++;

        $feima_pro = $feima_win / ($feima_win + $kasipa_win);
        echo '开局比分为: ' . $feima_begin . ':' . $kasipa_begin . ', 概率为:' . $feima_pro . '费马拿走了$: ' . ($money*$feima_pro), PHP_EOL;
    }

    return $feima_pro;
}

// 输入分的钱以及模拟测试次数

probability(100,100000);

/*
开局比分为: 3:6, 概率为:0.16897173782321费马拿走了$: 16.897173782321
开局比分为: 3:6, 概率为:0.16947115384615费马拿走了$: 16.947115384615
开局比分为: 3:6, 概率为:0.16936936936937费马拿走了$: 16.936936936937^C

开局比分为: 7:4, 概率为:0.8458523840627费马拿走了$: 84.58523840627
开局比分为: 7:4, 概率为:0.84595300261097费马拿走了$: 84.595300261097
开局比分为: 7:4, 概率为:0.84605348988911费马拿走了$: 84.605348988911

开局比分为: 6:2, 概率为:0.88472032742156费马拿走了$: 88.472032742156
开局比分为: 6:2, 概率为:0.88411724608044费马拿走了$: 88.411724608044


开局比分为: 6:5, 概率为:0.64754856614246费马拿走了$: 64.754856614246
开局比分为: 6:5, 概率为:0.64771151178918费马拿走了$: 64.771151178918^C
*/