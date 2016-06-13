<?php
$dir = dirname(__FILE__);
require_once($dir."/db.php");
require_once($dir."/PHPExcel/PHPExcel.php");
$db = new db($phpexcel); // 实例化db类，连接数据库 
$objPHPExcel = new PHPExcel(); // 实例化PHPExcel类, 新建一个sheet

for ($i = 1; $i <= 3; $i++) {
	if ($i > 1) {
		$objPHPExcel->createSheet();
	}
	$objPHPExcel->setActiveSheetIndex($i-1);
	$objSheet = $objPHPExcel->getActiveSheet();
	$data = $db->getDataByGrade($i);
	$objSheet->setTitle($i, "年级");
	$objSheet->setCellValue("A1", "姓名")->setCellValue("B1", "分数")->setCellValue("C1", "班级");
	$j = 2;

	foreach ($data as $key=>$val) {
		$objSheet->setCellValue("A".$j, $val['username'])->setCellValue("B".$j, $val['score'])->setCellValue("C".$j, $val['class']."班");
		$j++;
	}
}

$objWrite = PHPExcel_IOFactory::createWrite($objPHPExcel, 'Excel5');
var_dump($dir);die;
$objWrite->save($dir."/export_1.xls");
