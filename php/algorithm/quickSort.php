<?php
/*
选择一个基准元素， 通常选择第一个元素或者最后一个元素。通过一遍扫描， 将要排序序列分成两部分， 一部分比基准元素小， 一部分大于等于基准元素。基准位置在中间正确的位置。然后对左右两个数组递归';
*/

function quickSort($arr = [])
{
	// 判断是否需要继续进行
	$len = count($arr);
	if ($len <= 1) {
		return $arr;
	}

	// 以第一个元素作为基准
	$baseNum = $arr[0];

	// 遍历基准外所有元素，按大小放入两个数组内
	$leftArr = $rightArr = [];
	for ($i = 1; $i < $len; ++$i) {
		if ($baseNum > $arr[$i]) {
			$left[] = $arr[$i];
		}else {
			$right[] = $arr[$i];
		}
	}

	return array_merge(quickSort($leftArr), array($baseNum), quickSort($rightArr));
}

$testArr = [22, 29, 30, 2, 30, 9 , 40, 9, 88, 56, 99, 33, 21, 11];
var_dump(quickSort($testArr));

