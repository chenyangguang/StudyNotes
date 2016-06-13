<?php
namespace Others\Database;
use Others\IDatabase;
/**
 * 
 **/
class PDO implements IDatabase
{
	protected $conn;
	function connect($host, $user, $passwd, $dbname)
	{
		$conn = new \PDO("MySQL:host=$host;dbname=$dbname", $user, $passwd);
		$this->conn = $conn;

	}

	public function query($slq)
	{
		return $this->conn->query($sql);
	}

	public function close()
	{
		unset($this->conn);
	}
}
?>
