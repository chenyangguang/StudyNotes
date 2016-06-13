<?php
namespace Others;
/**
 * 
 **/
interface IDatabase   //接口mysql, mysqli, pdo进来统一
{
	function connect($host, $user, $password, $dbname);
	function query($sql);
	function close();
}

class Database
{
	protected $db;
	private function __construct()
	{
	}

	static function getInstance()
	{
		if (self::$db) {
			return self::$db;
		}else {
			self::$db = new self();
			return self::$db;
		}
	}

	function where($where)
	{
		return $this;
	}

	public function order($order)
	{
		return $this;
	}

	public function limit($limit)
	{
		return $this;
	}
}
?>
