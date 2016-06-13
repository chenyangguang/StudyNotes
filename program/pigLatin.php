<?php
header("Content-type:text/html;charset=utf-8");
/**
 * 拉丁猪游戏
 *
 * 拉丁猪文字游戏——这是一个英语语言游戏。基本规则是将一个英语单词的第一个辅音音素的字母移动到词尾并且加上后缀-ay（譬如“banana”会变成“anana-bay”）。可以在维基百科上了解更多内容。
 *
 * 思路： 
 *		(1) 将元音字母暂定为aeiou, 其他21个字母列为辅音字母
 *		(2) 查找到第一个元音出现的地方，作位置标记，
 *		(3) 截断标记位置前面的字符串， 放到后面，
 *
 **/

echo '拉丁猪游戏的php实现 <hr />';
$testString = 'thsetiflkdsjfldsj';
echo '$testString="thsetiflkdsjfldsj"';

function pigLatin($string)
{
	$vowels = [ 'a', 'e', 'i', 'o', 'u'];
	$stringToArray = str_split($string); // 字符串转数组

	$cutKey = -1;
	$consonants = [];
	foreach ($stringToArray as $key=>$val) {
		if (in_array($val, $vowels)) {
			$cutKey = $key; // 第一个元音位置
			break;
		} else {
			$consonants[] = $val; // 前面切割的辅音部分
		}
	}

	$newStart = array_slice($stringToArray, $cutKey); // 元音之后的部分
	$changeArr = implode('',array_merge($newStart, $consonants)); // 拼成元音在前，辅音在后，新的字符串
	$retStr = $changeArr.'-ay'; // 加额外的字母
	return $retStr;
}

 var_dump(pigLatin($testString));
?>
