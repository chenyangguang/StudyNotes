<?php
/**
 * 统计字符串的单词数目--统计字符串中单词的数目， 更复杂的从一个文本中读出字符串中的单词数目统计结果
 *
 * 思路：字符串中的单词数目统计办法->以空格区分单词间隔。
 * 思路2： 文本中单词数目统计策略->以标点符号或者空格换行符
 *
 **/

// method one ： explode() function 
function countWords($string)
{
	$wordArr = explode(" ", $string);
	return count($wordArr); // sizeof($wordArr);
}

// method two 
// preg_split() function
function countWordNum($string)
{
	$keywordsArr = preg_split("/[\s]+/", $string); // pattern as /[a-zA-Z]/ 可能也可以
	return sizeof($keywordsArr);
}

// method three
// str_word_count() function
function countWordsOfString($string)
{
	return str_word_count($string);
}

// 读取一个文件的单词数
// count the number of words in a file
function countFileWordNum($file)
{
	$string = file_get_contents($file);
	//$string = fgets($file);
	//$keywordsArr = preg_split("/[\s]+/", $string); 
	//$keywordsArr = preg_split('/[a-zA-Z]+/', $string);
	return countWordsOfString($string);
	//return count($keywordsArr);
}


$testString = "This a super saili test program string! Tell me how much words have you found.";
echo '字符串中的单词数目统计办法，字符串This a super saili test program string! Tell me how much words have you found.含有'.(countWords($testString)).'个单词';

var_dump(countWordNum($testString));
$file = './test.php';
var_dump(countFileWordNum($file));

var_dump(countWordsOfString($testString));
?>
