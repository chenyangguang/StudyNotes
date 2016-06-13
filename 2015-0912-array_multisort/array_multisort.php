<?php
foreach ($datas as $key => $row) {
	$volume[$key]  = $row['volume'];
	$edition[$key] = $row['edition'];
}

array_multisort($volume, SORT_NUMERIC, SORT_desc, $edition, SORT_ASC, $datas);
var_dump($datas);die;
?>
