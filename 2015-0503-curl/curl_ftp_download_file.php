<?php
$url = "ftp://192.168.1.100/downloaddemo.txt";
$curlobj = curl_init();
curl_setopt($curlobj, CURLOPT_URL, $url);
curl_setopt($curlobj, CURLOPT_HEADER, 0);
curl_setopt($curlobj, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curlobj, CURLOPT_TIMEOUT, 300);
curl_setopt($curlobj, CURLOPT_USERPWD, "sunshine:123456");
$outfile = fopen("dest.txt", 'wb');
curl_setopt($curlobj, CURLOPT_FILE, $outfile);

$rtn = curl_exec($outfile);
fclose($outfile);
if (!curl_errno($curlobj)) {
    //$info = curl_getinfo($curlobj);
    //print_r($info);
    echo "RETURN" . $rtn;
} else {
    echo 'Curl error: ' .   curl_error($curlobj);
}
curl_close($curlobj);
?>
