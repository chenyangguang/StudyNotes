<?php
//header("content-type: image/jpeg");
/**
 *  base64_encode(string $data)
 *  base64_decode(string $data[, bool $strict=false]) 对使用MIME base64编码的数据进行解码
 *  $strict ： 如果输入的数据超出了base64字母表， 则返回false
 **/

$data = "i'm a hacker, 4628492374983279832, hahhhhafhdsfsad";
echo base64_encode($data). "<hr />";
$base64_data = base64_encode($data);
echo base64_decode($base64_data)."<hr />";

//三种加密的合并方式
echo "三种加密的合并方式";
echo base64_encode(sha1(md5($data)));
?>
