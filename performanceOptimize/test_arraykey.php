<?php
$start = current_time();
$i = 0;
$arr = range(1, 200000);
while ( $i < 200000) {
    ++$i;
    //isset( $arr[$i] ); //50ms
    array_key_exists( $i, $arr ); //85ms
}

$end = current_time();
echo "Lost Time: ". number_format( $end - $start, 3) * 100 ;
echo "\n";

     function current_time()
    {
        list( $usec, $sec ) = explode( "", microtime());
        return ( (float)$usec + (float)$sec );
    }
?>
