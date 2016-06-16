<?php
    function C($name, $method){
        require_once('./libs/Controller/'.$name.'TestController.class.php');
        eval('$obj = new ' . $name. 'Controller(); $obj->'.$method.'();'); //php内置函数，把字符串执行成php语句
    }

     function M($name)
    {
        require_once('./libs/Model/'.$name.'Model.class.php');
    eval('$obj =  new '.$name.'Model();');

        return $obj;
        }

     function V($name)
    {
        require_once('./libs/View/'.$name.'View.class.php');
        eval('$obj = new ' .$name. 'View();');
        return $obj;
    }

     function daddslashes($str)
    {
        return (!get_magic_quotes_gpc()) ? addslashes($str): $str; //get_magic_quotes_gpc()魔法方法， 对特殊符号进行转义, 
    }
?>
