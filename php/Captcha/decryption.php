<?php
    $decry_email = 'XDY1XDc2XDY5XDZjXDYzXDZmXDczXDQwXDY3XDZkXDYxXDY5XDZjXDJlXDYzXDZmXDZk';
function decryption($decry_email)
{
    $real_email      = '';
    $decry_email_arr = array_shift(explode('\\', base64_decode($decry_email)));

    foreach ($decry_email_arr as $val) {
        $real_email .= chr(hexdec($val));
    }

    return $real_email;
}


function encrypt($str)
{
    $origin_arr = str_split($str);
    $encry_str  = '';
    foreach ($origin_arr as $v) {
        $encry_str .= base64_encode(dechex(ord($v)));
    }

    return $encry_str;
}

var_dump(decryption($decry_email));
var_dump(encrypt('evilcos@gmail.com'));
