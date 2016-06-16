<?php
/**
 * 
 **/
//use magic : 85ms
//not use magic 53ms
class test
{
    private $var = "123";
    public function __get( $varname )
    {
        return $this->var;
    }
}

$i = 0;
while ( $i<1000 ) {
    $i++;
    $test = new test();
    $test->var;
}
?>
