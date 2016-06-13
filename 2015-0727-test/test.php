<?php
	$first = time();
	echo $first;
	echo '<hr />';
	sleep(10);
	$two = time();
	echo $two;
	var_dump(($two-$first)/60);
?>
