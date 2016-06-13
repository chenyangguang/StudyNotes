<?php
namespace Others;
/**
 * 
 **/
class Factory
{
	static $proxy = null;

	static function createDatabase()
	{
		//$db = new Database();
		$db = Database::getInstance();

		Register::set('db1', $db);

		return $db;
	}

	// 工厂方法
	static function getUser($id)
	{

		$key = 'user_'.$id;
		$user = Register::get($key);
		if (!$user) {
			$user = new User($id);
			Register::set($key, $user); // 使用注册器模式 防止重复生成对象
		} 		

		// $user = new User($id);
		return $user;
	}

	static function getDatabase($id = 'proxy')
	{
		if ($id == 'proxy') {
			if (!self::$proxy) {
				self::$proxy = new \Others\Database\Proxy;
			}
			return self::$proxy;
		}

		$key = 'database'.$id;
		if ($id == 'slave') {
			$slaves = Application::getInstance()->config['database']['slave'];
			$db_conf = $slaves[array_rand[$slaves]]; // 随机获取一个从配置
		}else {
			$db_conf = Application::getInstance()->config['database'][$id];
		}

		$db = Register::get($key);
		if (!$db) {
			$db = new Database\MySQL();
			$db->connect($db_conf['host'], $db_conf['user'], $db_conf['password'], $db_conf['dbname']);
			Register::set($key, $db);
		}

		return $db;
	}
}
?>
