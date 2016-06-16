<?php
    $array_1 = $array_2 = rand(1000, 2000);
    shuffle( $array_1 ); //shuffle打乱
    shuffle( $array_1 );

    $array_merged = array_merge($array_1, $array_2);
    var_dump( $array_1, $array_2, $array_merged );
?>
