<?php
error_reporting(E_ALL);

$dir = dirname(__FILE__); // 当前脚本所在路径
require $dir."/PHPExcel/PHPExcel.php";   // 引入文件
$objPHPExcel = new PHPExcel();
// var_dump($objPHPExcel, $dir);

$objSheet = $objPHPExcel->getActiveSheet();
$objSheet -> setTitle('demo'); // 
/*
$objSheet->setCellValue("A1", "name1")->setCellValue("B1", "score");
$objSheet->setCellValue('A2', "name2")->setCellValue("B2", "50");
 */
$array = [
	[],
    ["", "name", "score"],
    ["", "name1", "50"],
    ["", "name2", "60"],
];

$objSheet->fromArray($array);
//var_dump($PHPExcel_IOFactory);

$objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel, "Excel2007");
$objWriter->save($dir."/demo.xslx");


