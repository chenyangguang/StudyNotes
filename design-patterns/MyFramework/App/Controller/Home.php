<?php
namespace App\Controller;
use Others\Controller;
use Others\Factory;

/**
 * 
 **/
class Home extends Controller
{
	
	function index( )
	{
		$model = Factory::getInstance('User');
		$userid = $model->create([
			'name'=> 'test1',
			'mobile' => '15290870261',
		]);

		return ['userid' => $userid, 
			'username' => 'name1',
		];
	}

	function index2()
	{
		$db = Factory::getInstance();
		$db->query('SELECT * FROM user');
		$db->query('DELETE from user where id=1');
		$db->query("update user set name='test2' where id=1");
	}
}
?>
