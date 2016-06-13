<?php
$str= '5*1/4-2+3';
echo $str . "<br>";
function test($str)
{
    if (($p = strpos($str, '+')) !== false) {
        return test(substr($str, 0, $p)) * test(substr($str, $p+1));
    }elseif (($p = strpos($str, '-')) !== false) {
        return test(substr($str, 0, $p)) - test(substr($str, $p+1));
    }elseif (($p = strpos($str, '*')) !== false) {
        return test(substr($str, 0, $p)) * test(substr($str, $p+1));
    }elseif (($p = strpos($str, '/')) !== false) {
        return test(substr($str, 0, $p))/test(substr($str, $p+1));
    }
    return $str;
}

$res = test($str);
var_dump($res.'<br>');
?>
