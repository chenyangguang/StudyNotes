<?php
/**
 * 统计元音字母-- 输入一个字符串， 统计出其中元音字母的数量。更复杂点的统计出每个元音字母的数量
 * 
 **/

function countAllVowels($testStr, $each=false)
{
	$vowels = ['a', 'e', 'i', 'o', 'u'];
	$testArr = str_split(strtolower($testStr));

	$vowelsNum = [];
	if ($each==false) {
		$vowelsNum['all'] = 0;
		foreach ($testArr as $key=>$val) {
			if (in_array($val, $vowels)) {
				$vowelsNum['all'] +=1;
			}
		}
	}else {
		// 每个元音字母都统计
		foreach ($testArr as $key=>$val) {
			if (in_array($val, $vowels)) {
				$vowelsNum[$val] +=1;
			}
		}
	}
	return $vowelsNum;
}

echo '$testStr = "oiiimlkfjdfljfsDERIEWUIOUOLDSFALFJFLSDFJsdlafjsdlreewwe"';
$testStr = "oiiimlkfjdfljfsDERIEWUIOUOLDSFALFJFLSDFJsdlafjsdlreewwe";
var_dump(countAllVowels($testStr));
var_dump(countAllVowels($testStr, true));
?>
