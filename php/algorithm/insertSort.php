<?php
header("Content-type:text/html;charset=utf-8");
echo "php实现算法～插入排序"."<br />";
/*
 * 在要排序的一组数中， 假设前面的数已经是排好顺序的，现在要把第n个数插入到前面的有序数中，使得这n个数也是排好顺序的。如此反复循环，直到全部排好顺序。
 * */

function insertSort($arr)
{
	$len = count($arr);
    for ($i = 1; $i < $len; $i++) {
        $tmp = $arr[$i];

		// 内层循环控制，比较并插入
		for ($j = $i - 1; $i >= 0; $j--) { 
            if ($tmp < $arr[$j]) {

				// 发现插入的元素要晓，就交换位置，将后边的元素与前面的元素互换
				$arr[$j+1] = $arr[$j]; 
                $arr[$j] = $tmp;
            }else {

				// 如果碰到不需要移动的元素，由于是已经排序好是数组，前面的无需再比较
                break;
            }
        }
    }
	return $arr;
}

$testArray = [20, 25, 30, 2, 33, 45, 9, 78, 55, 43, 98, 44, 88, 3];
var_dump(insertSort($testArray));
