<?php
require dirname(__FILE__)."/dbconfig.php";

class db{
    public $conn = null;

    public  function __construct($config){
        $this->conn = mysql_connect($config['host'], $config['username'], $config['password']) or die(mysql_error());
        mysql_select_db($config['database'], $this->conn) or die(mysql_error());
        mysql_query("set names ".$config['charset']) or die (mysql_error());
    }

    public function getResult($sql){
        $resource = mysql_query($sql, $this->conn) or die(mysql_error());
        $res = array();
        while ($row = mysql_fetch_assoc($resource) !== false) {
            $res[] = $row;
        }
        return $res;
    }

    public function getDataByGrade($grade){
        $sql = "SELECT username, score, class from user where grade=".$grade. " order by score desc";
		$res = self::getResult($sql); 
		
		return $res;
    }
}
