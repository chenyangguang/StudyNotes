<?php
namespace Others;

/**
 * 
 **/
class User
{
	public $id;
	public $name;
	public $regtime;
	public $mobile;
	function __construct($id)
	{
		$this->db = new \Others\Database\MySQLi();
		$this->db->connect('127.0.0.1', 'root', 'root', 'test');
		$res = $this->db->query('SELECT * from user limit 1');
		$data = $res->fetch_assoc();
		$this->id = $data['id'];
		$this->name = $data['name'];
		$this->mobile = $data['mobile'];
		$this->regtime = $data['time'];
	}

	function __destruct()
	{
		$this->db->query("UPDATE user set name='{$this->name}', mobile='{$this->mobile}', retime='{$this->regtime}' where id={$this->id} limit 1");
	}
}
?>
