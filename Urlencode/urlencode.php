<?php
/**
*   ?       -> %3F
*   =       -> %3D 
*   空格    -> +
*   %       -> %25
*   &       -> %26
*   \       -> %5C
*   +       -> %2B
 **/
$str = "this a test for urlencode";

echo urlencode($str);
echo "<hr />";
$str_2 = "abc&killcommand.php?uerws+fdsfldsjflds-fdsjf#";
echo urlencode($str_2);
$srcStr = urldecode(urlencode($str_2));
?>
