<?php
/**
 * rawurlencode()
 *把空格变成 %20
 其它和urlencode()
 其他没什么区别
 **/
$test = "test kaokao&&8*(&(&(*&(*&(*))%abc";
echo urlencode($test);
echo "<br />";
echo rawurlencode($test);
?>
