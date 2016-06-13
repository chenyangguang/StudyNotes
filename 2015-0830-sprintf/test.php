<?php
header("Content-type:text/html;charset=utf-8");
echo "使用sprintf, <<< 优化代码";
echo "<hr />";

$str_1 = "Hello";
$str_2 = "World";
$str = <<<HTML
<table border="0">
	<tr><th> %s</th></tr>
	<tr><th> %s</th></tr>
</table>
HTML;
	echo sprintf($str, $str_1,  $str_2);
?>

