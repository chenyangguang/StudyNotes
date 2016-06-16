<?php
header("Content-type:text/html;charset=utf-8");
/**
 * 逆转字符串
 * 输入一个字符串，将其逆转并输出
 **/

/**
 * 思路1： php自带的有关数组的函数方法
 * 具体：
 *      (1) 先切割字符成为数组
 *      (2) 反转数组
 *      (3) 数组转字符串
 **/
$stringInit = 'fsdfljflsdjfldsfdjsoerueworoiuouxirew';
echo $stringInit;

$initArray = str_split($stringInit);
$endArray =  array_reverse($initArray);
$stringEnd = implode($endArray);

var_dump($stringEnd);

/**
 * 思路2: 使用替换的方法。具体：头尾互换，至之间值为止。
 **/
$strTwo = 'fsdfljflsdjfldsfdjsoerueworoiuouxirew';
for ($i = 0, $j = strlen($strTwo)-1;$i <= $j; $i++, $j--) {
	$temp = $strTwo[$j];
	$strTwo[$j] = $strTwo[$i];
	$strTwo[$i] = $temp;
}
var_dump($strTwo);


/**
 * 思路3 :  php字符串反转函数
 **/
$stringEndThree = strrev($stringInit);
var_dump($stringEndThree);

/**
 * 思路4：循环，每次截断字符串最后一个，重新拼接起来新的字符串
 **/

$stringFour = '';
for ($i = strlen($stringInit)-1; $i >= 0; $i--) {
	$stringFour .= substr($stringInit, $i, 1); // $i位置， 截断一个
}
var_dump($stringFour);

/**
 * 思路5： 倒序截断数组
 **/
$stringFive = '';
$fiveArray = str_split($stringInit);
for ($i =count($fiveArray); $i >=0 ; $i--) {
	$stringFive .= ($fiveArray[$i]);
}
var_dump($stringFive);

