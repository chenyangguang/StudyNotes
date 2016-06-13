<?php
$act = $_REQUEST['act'];
$username = $_POST['username'];
$password = md5($_POST['password']);
mysql_connect('localhost', 'root' , 'root');
mysql_select_db("imooc");
mysql_set_charset("utf8");
if ($act  == "reg") {
    $sql = "insert into user(username, password) values ('{$username}', '{$passwrod}')";
    $result = mysql_query($sql);
    if ($result) {
        echo "register success!";
    }else {
        echo "注册失败";
    }
}elseif ($act == 'dologin') {
    $sql = "select * from user where username='{$username}' AND password='{$password}'";
    $result = mysql_query($sql);
}
?>
