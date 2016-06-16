<?php
/**
 * 回文判断
 * 判断用户输入的字符串是否为回文。回文是指正反拼写形式都是一样的词，譬如“racecar”
 * 思路：
 *		依次比较正反序号的对应字符串， 知道中间值，所有符合，就是回文
 **/

function checkPalindrome($str)
{
	for ($i = 0, $j = strlen($str)-1;$i <= $j; $i++, $j--) {
		if ($str[$i] != $str[$j]) {
			return false;
		}
		return true;
	}
}
$strTest = 'racecar';
$res = checkPalindrome($strTest);

if($res){
	echo '字符串 '.$strTest.'是回文';
}else {
	echo '字符串 '.$strTest.'不是回文';
}
?>
