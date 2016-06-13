<?php
$db = new mysqli;
$db->connect('127.0.0.1', 'root', 'root', 'test');
swoole_mysql_query($db, "show tables", function(mysqli $db, $r) {
        var_dump($db->_affected_rows, $db->_insert_id, $r);
});
?>
