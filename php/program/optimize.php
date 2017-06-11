<?php

/*
  优化一个实现了1+1+2+3+5+8+13+21+34+55...的算法
 */
function func($n) {
    if($n == 1 || $n == 2) {
        return 1;
    }

    return func($n - 1) + func($n - 2);
}

// var_dump(func(20)); // int(6765) php test.php  0.05s user 0.02s system 95% cpu 0.067 total
// var_dump(func(30)); // int(832040) php test.php  1.38s user 0.02s system 99% cpu 1.407 total
#var_dump(func(35)); // int(9227465) php test.php  16.36s user 0.03s system 98% cpu 16.630 total


// 从上面的结构来看，越到后面，递归的效率越低。

// 怎么优化？
static $tmp;
function func_opt($n)
{
    if($n == 1 || $n == 2) {
        return 1;
    }

    $tmp = func_opt($n - 2);
    return $tmp + func_opt($n - 1);
}
var_dump(func_opt(1));
var_dump(func_opt(2));
var_dump(func_opt(3));
var_dump(func_opt(5));
var_dump(func_opt(10));
var_dump(func_opt(100));