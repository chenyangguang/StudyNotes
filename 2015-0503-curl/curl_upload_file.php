<?php
$curlobj = curl_init();
$localfile = "ftp01.php";
$fp = fopen($localfile, 'r');

$url = "ftp://192.168.1.100/ftp01_uploaded_01.php";
curl_setopt($curlobj, CURLOPT_URL, $url);
curl_setopt($curlobj, CURLOPT_HEADER, 0);
curl_setopt($curlobj, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curlobj, CURLOPT_TIMEOUT, 300);
curl_setopt($curlobj, CURLOPT_USERPWD, "sunshine:123456");

curl_setopt($curlobj, CURLOPT_UPLOAD, 1);
curl_setopt($curlobj, CURLOPT_INFILE, $fp);
curl_setopt($curlobj, CURLOPT_INFILESIZE, filesize($localfile));

$rtn = curl_exec($curlobj);
if (!curl_errno($curlobj)) {
    echo "Uploaded successfully!";
} else {
    echo "Curl error: " . curl_error($curlobj);
}
curl_close($curlobj);
?>
