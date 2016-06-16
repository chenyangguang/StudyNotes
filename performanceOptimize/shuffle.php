<?php
$numbers = range(1,20);
shuffle($numbers);
foreach ($numbers as $number) {
    echo "$number ";
}
?>
