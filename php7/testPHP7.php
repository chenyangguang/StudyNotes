<?php
$a = [

];

for ($i = 0; $i < 600000; $i++) {
	$a[$i] = $i;
}
foreach ($a as $i) {
	array_key_exists($i, $a);
}
?>
