<?php
$b = [];
for ($i = 0; $i < 60000; $i++) {
	$b[$i] = $i;
}

foreach ($b  as $i) {
	array_search($i, $b);
}

?>
