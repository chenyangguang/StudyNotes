<?php
//自动载入
/*
   require 'test1.php';
   require 'test2.php';
		Test1\test();
		Test2\test();
*/

spl_autoload_register('autoload1'); //取代__autoload
spl_autoload_register('autoload2');


Test1::test();
Test2::test();

function autoload1($class)
{

 	//$class = strtolower($class);
	require __DIR__."/".$class.".php";
}

function autoload2($class)
{
 	//$class = strtolower($class);
	require __DIR__."/".$class.".php";
}
