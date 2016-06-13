<?php
namespace Others;
class Proxy implements IUserProxy
{
	function getUserName($id)
	{
		$db = Factory::getDatabase('slave');
		$info = $db->query("SELECT * from user where id=$id limit 1");
	}

	public function setUserName($id, $name)
	{
		$db = Factory::getDatabase('master');
		$Db->query("UPDATE user set name=$name WHERE id=$id limit 1");
	}
}
?>
