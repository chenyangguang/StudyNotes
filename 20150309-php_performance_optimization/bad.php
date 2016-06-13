<?php
$array_1 = array();
$array_2 = array();

for ($i = 0; $i < rand(1000, 2000); $i++) {
    $array_1[] = rand();
    // code...
}

for ($i = 0; $i < rand(1000, 2000); $i++) {
    $array_2[] = rand();
}

//合并数组
$array_merged = array();
foreach ($array_1 as $v) {
    $array_merged[] = $v;
}

foreach ($array_2 as $v) {
    if (!in_array($v, $array_merged)) {
        $array_merged[] = $v;
    }
}
var_dump($array_1, $array_2, $array_merged);
?>
