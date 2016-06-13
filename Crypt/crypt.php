<?php
/**
 * crypt加密算法
 **/
echo crypt("sunshine");
echo "<hr />";
echo crypt("sunshine", "kaokao");
if (CRYPT_STD_DES) {
    echo "DES标准算法：" . crypt("sunshine", "this is a test for you");
    echo "<hr />";
} elseif(CRYPT_MD5) {
    echo "MD5加密:". crypt("sunshine","$sunshine");
}

?>
