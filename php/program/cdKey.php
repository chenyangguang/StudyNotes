<?php
/**
 *  CD-Key生成器——利用某种算法生成一个唯一的key。软件开发者可以用它来作为软件的激活器
 **/
header("Content-type:text/html;charset=utf-8");
echo 'CD-Key生成器——利用某种算法生成一个唯一的key。软件开发者可以用它来作为软件的激活器'."<hr />";

function cdKey()
{
	$time = time();
	return md5($time);
}

$ret = cdKey();
var_dump($ret);
?>
