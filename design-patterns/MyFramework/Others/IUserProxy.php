<?php
namespace Others;
interface IUserProxy
{
	public function getUserName($id);
	public function setUserName($id, $name)
}
?>
