<?php
namespace App\Model;

use Others\Factory;

/**
 * 
 **/
class User extends \Others\Model	
{

	function getInfo($id)
	{
		return Factory::getDatabase('slave')->query('select * from user where id=$id limit 1')->fetch_assoc();
	}

	function create($user)
	{
		$userid = 1;
		$this->notify($user);
		return $userid;
	}
}
?>
