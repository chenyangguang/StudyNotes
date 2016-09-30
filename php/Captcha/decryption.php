<?php
    $decry_email = 'XDY1XDc2XDY5XDZjXDYzXDZmXDczXDQwXDY3XDZkXDYxXDY5XDZjXDJlXDYzXDZmXDZk';
    $decry_email = base64_decode($decry_email);
    $decry_email_arr = explode('\\', $decry_email);

    $real_email = '';
    $purge_email = array_shift($decry_email_arr);

    foreach ($decry_email_arr as $val) {
        $real_email .= chr(hexdec($val));
    }

var_dump($real_email);

