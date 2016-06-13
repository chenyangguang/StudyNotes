<?php
// 自己画一个
require './jpgraph-3.5.0b1/src/jpgraph.php';
require './jpgraph-3.5.0b1/src/jpgraph_line.php';

// 1. 创建画布
$graph = new Graph(600, 400);
//2 .设置横纵坐标样式
$aAxisType = 'textint';
$graph->SetScale($aAxisType);

$graph->title->Set('this is my test');

// 标题中文支持配置
$graph->title->SetFont(FF_CHINESE);
$graph->title->Set('我勒个去');
$data= [
	1=>300, 
	2=>400,
	3=>800,
	4=>600,
	5=>900,
	6=>1000,
	7=>1100,
	8=>1200,
	9=>100,
	10=>900,
];

$linePlot = newLinePlot($data);
// 设置图例
$linePlot->SetLegend('tuli');
// 将统计图添加到画布上
$graph->Add($linePlot);
$linePlot->SetColor('red');
//$graph->Stroke('./test.png'); // 保存图片
$graph->Stroke(); // 直接显示



?>
