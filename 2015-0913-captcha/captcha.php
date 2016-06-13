<?php
session_start();
error_reporting(E_ALL);
header('content-type: image/png');
$image = imagecreatetruecolor(100, 30);
$bgcolor = imagecolorallocate($image, 255, 255, 255); // #ffffff
imagefill($image, 0, 0, $bgcolor); // 白底画板

// 注意文字不能重合或显示不完整
/*
for ($i = 0; $i < 4; $i++) {
	$fontsize = 6;
	$fontcolor = imagecolorallocate($image, rand(0, 120), rand(0, 120), rand(0, 120));
	$fontcontent = rand(0, 9);

	$x = ($i*100/4)+rand(5,10);
	$y = rand(5, 10);
	imagestring($image, $fontsize, $x, $y, $fontcontent, $fontcolor);
}
 */

$captch_code = '';
for ($i = 0; $i < 4; $i++) {
	$fontsize = 6;
	$fontcolor = imagecolorallocate($image, rand(0, 120), rand(0, 120), rand(0, 120));
	$data = 'abcdefghijknqrstuvwxy6789';
	$fontcontent =  substr($data, rand(0, strlen($data)), 1);
	$captch_code .= $fontcontent;

	$x = ($i*100/4)+rand(5, 10);
	$y = rand(5, 10);
	imagestring($image, $fontsize, $x, $y, $fontcontent, $fontcolor);
}
$_SESSION['authcode'] = $captch_code;


// 干扰元素 --> 点
for ($i = 0; $i < 200; $i++) {
	$pointcolor = imagecolorallocate($image, rand(50, 200), rand(50, 200), rand(50, 200)); // 干扰颜色需要是浅色, -- 干扰点
	imagesetpixel($image, rand(1, 99), rand(1,29), $pointcolor);
}

// 干扰线
for ($i = 0; $i < 3; $i++) {
	$linecolor = imagecolorallocate($image, rand(80, 200), rand(80, 200), rand(80, 200));
	imageline($image, rand(1, 99), rand(1, 29), rand(1, 99), rand(1, 29), $linecolor);
}

imagepng($image);

imagedestroy($image); // end 
?>
